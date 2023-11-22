<?php

namespace App\Http\Controllers;

use App\Models\discuss;
use App\Models\dokumen;
use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user_pageController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
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
            ->get();

        return view('user.lihatuser', compact('data', 'dokumens', 'discusses'));
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

        // $nama_dokumens = $request->nama_dokumen;
        // $files = $request->file('file');

        // for ($i = 0; $i < count($nama_dokumens); $i++) {
        //     $file = $files[$i];
        //     // Get the file's original extension and generate a new unique name for it
        //     $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        //     $filePath = 'app/public/dokumen/' . $fileName;

        //     // Move file to storage
        //     $file->move(storage_path('app/public/dokumen'), $fileName);

        //     dokumen::create([
        //         'id_pengajuan' => $pengajuan->id_pengajuan,
        //         'nama_dokumen' => $nama_dokumens[$i],
        //         'nama_file' => $filePath,
        //     ]);
        // }

        //Menyimpan data dokumen dengan id_pengajuan
        // $nama_dokumens = $request->nama_dokumen;
        // $docs = $request->file('file'); // "file" should be a name of input field in the form

        // // Check if $nama_dokumens is an array
        // if (!is_array($nama_dokumens)) {
        //     // If not, convert it to an array
        //     $nama_dokumens = [$nama_dokumens];
        // }

        // // Check if $docs is an array
        // if (!is_array($docs)) {
        //     // If not, convert it to an array
        //     $docs = [$docs];
        // }

        // for ($i = 0; $i < count($nama_dokumens); $i++) {
        //     // You should make sure there is a file associated with this document name
        //     if (!isset($docs[$i])) {
        //         continue;
        //     }

        //     $file = $docs[$i];

        //     // Make sure $file is an instance of UploadedFile.
        //     if (!($file instanceof \Illuminate\Http\UploadedFile)) {
        //         continue; // or throw an exception
        //     }

        //     $fileName = uniqid() . '.' . $file->getClientOriginalExtension();
        //     $folder = storage_path('app/public/dokumen');
        //     $file->move($folder, $fileName);

        //     dokumen::create([
        //         'id_pengajuan' => $pengajuan->id_pengajuan,
        //         'nama_dokumen' => $nama_dokumens[$i],
        //         'nama_file' => $fileName,
        //     ]);
        // }

        return redirect()->route('user.index');
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
