<?php

namespace App\Http\Controllers;

use App\Models\discuss;
use App\Models\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pelaksanaController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'pelaksana') {
            return redirect('404');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori', 'pengajuan.created_at', 'pengajuan.unit_kerja')
            ->where('pengajuan.IsDelete', 0)
            ->where('pengajuan.IsApproved', '=', '1')
            ->paginate(10000000);

        return view('pelaksana.pelaksana', compact('data'));
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

        return view('pelaksana.lihatpelaksana', compact('data', 'dokumens', 'discusses'));
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
}
