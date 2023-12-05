<?php

namespace App\Http\Controllers;

use App\Models\log;
use App\Models\admin;
use App\Models\discuss;
use App\Models\dokumen;
use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kourController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') ||  $req->session()->get('user_type') !== 'kour') {
            return redirect('404');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori', 'pengajuan.created_at', 'pengajuan.unit_kerja')
            ->where('pengajuan.IsDelete', 0)
            ->paginate(10000000);

        return view('kour.kour', compact('data'));
    }

    public function discussion($id)
    {
        // Fetch pengajuan and related kategori
        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'kategori.nama_kategori')
            ->where('pengajuan.id_pengajuan', $id)
            ->first();

        // Fetch all related dokumen
        $dokumens = DB::table('dokumen')
            ->where('id_pengajuan', $id)
            ->get();

            $discusses = DB::table('discuss')
            ->join('users', 'discuss.id_user', '=', 'users.id_user')
            ->leftJoin('dokumen', 'discuss.id_disc', '=', 'dokumen.id_disc')
            ->select('discuss.*', 'users.username', 'dokumen.nama_file', 'dokumen.id_disc')
            ->where('discuss.id_pengajuan', $id)
            ->orderBy('discuss.created_at', 'desc') // Tambahkan ini untuk mengurutkan berdasarkan tanggal
            ->get();
            $logs = Log::where('id_pengajuan', $id)->get();


        return view('kour.lihatkour', compact('data', 'dokumens', 'discusses','logs'));
    }

    public function storeDiscuss(Request $request)
    {
        // validate the incoming request data
        $validated = $request->validate([
            'id_pengajuan' => 'required|exists:pengajuan,id_pengajuan',
            'Komentar' => 'required|string',
        ]);

        // Create the discussion
        $diskusi = discuss::create([
            'id_pengajuan' => $validated['id_pengajuan'],
            'id_user' => $request->session()->get('user_id'),
            'isi' => $validated['Komentar'],
        ]);

        $files = $request->file('file');

        // Assume both array $files and $documents are the same size
        if (is_array($files)) {
            for ($i = 0; $i < count($files); $i++) {
                $docdisc = new dokumen();
                $docdisc->id_disc = $diskusi->id_disc;

                if (isset($files[$i])) {
                    $file = $files[$i];
                    $fileName = time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/suratna', $fileName);
                    $docdisc->nama_file = $fileName;
                } else {
                    // Handle no file uploaded. You could provide a default file or cancel the operation
                    $docdisc->nama_file = 'default.txt'; // example default value
                }

                $docdisc->save();

                // Redirect back with success message
            }
        }
        return redirect()
            ->back()
            ->with('message', 'Discussion added successfully!');
    }
    public function download($id_dokumen)
    {
        try {
            $surat = dokumen::findOrFail($id_dokumen);
            $path = storage_path('app/public/suratna/' . $surat->nama_file);

            return response()->download($path);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where data with the given ID is not found.
            return redirect()
                ->back()
                ->with('error', 'Surat not found.');
        }
    }
    // KourController.php

    public function showPerijinan($id)
    {
        return view('kour.perijinan', ['id_pengajuan' => $id]);
    }

    public function processPerijinan(Request $request, $id_pengajuan)
    {
        $status_perijinan = $request->input('status_perijinan');
    
        // Get the Pengajuan model instance based on $id_pengajuan
        $pengajuan = Pengajuan::find($id_pengajuan);
    
        if (!$pengajuan) {
            // Handle the case where Pengajuan is not found
            return redirect()
                ->route('kour.index')
                ->with('error', 'Pengajuan not found');
        }
    
        // Update 'IsApproved' based on the selected status
        $pengajuan->IsApproved = $status_perijinan;
        $pengajuan->save();
    
        return redirect()
            ->route('kour.index')
            ->with('message', 'Perijinan status updated successfully');
    }

    public function approveAction(Request $request)
    {
        $validatedData = $request->validate([
            'approvalStatus' => 'required|in:1,2', // Assuming the approval status can only be 1 or 2
            'id_pengajuan' => 'required|exists:pengajuan,id_pengajuan', // Validate that the id_pengajuan exists in the Pengajuan table
        ]);

        $approvalStatus = $validatedData['approvalStatus'];
        $idPengajuan = $validatedData['id_pengajuan'];

        // Update the Pengajuan record based on the approval status
        $pengajuan = Pengajuan::find($idPengajuan);
        if ($pengajuan) {
            $pengajuan->IsApproved = $approvalStatus;
            $pengajuan->save();
            
            $adminUser = admin::find($request->session()->get('user_id'));

            // Add log entry
            $logMessage = ($approvalStatus == 1) ? 'Pengajuan disetujui' : 'Pengajuan ditolak';
            $logMessage .= ' oleh ' . $adminUser->username;
    
            Log::create([
                'id_pengajuan' => $idPengajuan,
                'isi_log' => $logMessage,
            ]);
            return redirect()->back()->with('message', 'Status Perijinan Berhasil Diperbaharui');
        }

        return redirect()->back()->with('error', 'Pengajuan tidak ditemukan.');
    }
    
}
