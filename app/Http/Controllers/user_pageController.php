<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\log;
use App\Models\discuss;
use App\Models\dokumen;
use App\Models\kategori;
use App\Models\pengajuan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user_pageController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'user') {
            return redirect('404');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori')
            ->where('pengajuan.IsDelete', 0)
            ->paginate(10000000);

        return view('user.user', compact('data'));
    }

    //...
    public function detailUser($id)
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


        return view('user.lihatuser', compact('data', 'dokumens', 'discusses','logs'));
    }

    //...

    public function getKategoriDetail($id_kategori)
    {
        $data = DB::table('kategori')
            ->where('id_kategori', $id_kategori)
            ->first();
        return response()->json($data);
    }

    public function create()
    {
        $kategoris = DB::table('kategori')->get();

        return view('user.pengajuan', compact('kategoris'));
    }

    public function store(Request $request)
    {
        // $request->validate([
        //     'tentang' => 'required',
        //     'unit_kerja' => 'required',
        //     'id_kategori' => 'required',
        //     'nama_dokumen' => 'required',
        //     'nama_file' => 'required',
        // ]);

        $user = admin::find($request->session()->get('user_id'));

        //Menyimpan data pengajuan
        $pengajuan = pengajuan::create([
            'tentang' => $request->tentang,
            'unit_kerja' => $request->unit_kerja,
            'catatan' => $request->catatan,
            'id_kategori' => $request->id_kategori,
            'id_user' => $request->session()->get('user_id'),
            'obj_pembayaran' => $request->obj_pembayaran,
            'deskripsi' => $request->deskripsi,
        ]);
        

        Log::create([
            'id_pengajuan' => $pengajuan->id_pengajuan,
            'isi_log' => 'Pengajuan dibuat oleh ' . $user->username,
        ]);

        $files = $request->file('nama_file');
        $documents = $request->get('nama_dokumen');

        // Assume both array $files and $documents are the same size
        for ($i = 0; $i < count($files); $i++) {
            $dokumen = new dokumen();
            $dokumen->id_pengajuan = $pengajuan->id_pengajuan;
            $dokumen->nama_dokumen = $documents[$i];

            if (isset($files[$i])) {
                $file = $files[$i];
                $fileName = time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                $file->storeAs('public/suratna', $fileName);
                $dokumen->nama_file = $fileName;
            } else {
                // Handle no file uploaded. You could provide a default file or cancel the operation
                $dokumen->nama_file = 'default.txt'; // example default value
            }

            $dokumen->save();
        }

        return redirect()->route('user.index')->with('pesan',"Data Berhasil Ditambahkan");
    }

    public function edit($id)
    {
        $pengajuan = Pengajuan::find($id);
        $kategori = kategori::find($pengajuan->id_kategori);
        $kategoris = kategori::all();
        $dokumens = Dokumen::where('id_pengajuan', $id)->get();

        return view('user.edit', compact('pengajuan', 'kategoris', 'kategori', 'dokumens'));
    }

    public function update(Request $request, $id)
    {
        $pengajuan = Pengajuan::find($id);
        $pengajuan->update([
            'tentang' => $request->tentang,
            'unit_kerja' => $request->unit_kerja,
            'catatan' => $request->catatan,
            'id_kategori' => $request->id_kategori,
            'obj_pembayaran' => $request->obj_pembayaran,
            'deskripsi' => $request->deskripsi,
        ]);
        $user = admin::find($request->session()->get('user_id'));

        Log::create([
            'id_pengajuan' => $pengajuan->id_pengajuan,
            'isi_log' => 'Pengajuan diperbarui oleh ' . $user->username,
        ]);

        // Only process documents if there are new ones provided
        if ($request->has('nama_dokumen') || $request->hasFile('nama_file')) {
            $files = $request->file('nama_file');
            $documents = $request->get('nama_dokumen');
            $documents = $request->get('nama_dokumens');

            $fileCount = $files ? count($files) : 0;

            for ($i = 0; $i < $fileCount; $i++) {
                $dokumen = new Dokumen();
                $dokumen->id_pengajuan = $pengajuan->id_pengajuan;
                $dokumen->nama_dokumen = isset($documents[$i]) ? $documents[$i] : null;

                if (isset($files[$i])) {
                    $file = $files[$i];
                    $fileName = time() . '_' . $i . '.' . $file->getClientOriginalExtension();
                    $file->storeAs('public/suratna', $fileName);
                    $dokumen->nama_file = $fileName;
                } else {
                    $dokumen->nama_file = null; //example default value
                }

                $dokumen->save();
            }
        }
        return redirect()->route('user.index')->with('pesan',"Data Berhasil Di Perbarui");
    }

    // Add this method to your controller
    public function deleteDocument($id_dokumen)
    {
        try {
            $dokumen = Dokumen::findOrFail($id_dokumen);
            $path = storage_path('app/public/suratna/' . $dokumen->nama_file);

            // Delete the document from the database
            $dokumen->delete();

            // Delete the file from storage
            if (file_exists($path)) {
                unlink($path);
            }

            return response()->json(['success' => true]);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Document not found.']);
        }
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

    public function destroy($id)
    {
        // Find the pengajuan
        $pengajuan = pengajuan::find($id);

        // If we didn't find a valid pengajuan, then redirect (or error, etc.)
        if (!$pengajuan) {
            return redirect()
                ->back()
                ->with('error', 'Invalid pengajuan ID');
        }

        // We found the pengajuan, so 'delete' it and then redirect (or whatever you want to do)
        $pengajuan->IsDelete = 1;
        $pengajuan->save();

        // Redirect (or whatever you'd like to do after 'deleting' the pengajuan)
        return redirect()
            ->back()
            ->with('success', 'Pengajuan deleted successfully');
    }

    public function download($id_dokumen)
    {
        try {
            $surat = Dokumen::findOrFail($id_dokumen);
            $path = storage_path('app/public/suratna/' . $surat->nama_file);

            // Get the contents of the PDF file
            $fileContent = file_get_contents($path);

            // Set the Content-Type header to display the PDF in the browser
            $headers = [
                'Content-Type' => 'application/pdf',
            ];

            return response($fileContent, 200, $headers);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            // Handle the case where data with the given ID is not found.
            return redirect()
                ->back()
                ->with('error', 'Surat not found.');
        }
    }
}
