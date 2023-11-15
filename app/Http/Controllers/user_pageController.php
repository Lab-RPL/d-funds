<?php

namespace App\Http\Controllers;

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
        //     'catatan' => 'required',
        //     'id_kategori' => 'required',
        //     'obj_pembayaran' => 'required',
        //     'deskripsi' => 'required',
        //     'file' => 'required',
        //     'nama_dokumen' => 'required',
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
        //          "id_pengajuan" => $pengajuan->id,
        //          "nama_dokumen" => $nama_dokumens[$i],
        //          "file" => $filePath,
        //      ]);
        // }
        

        // //Menyimpan data dokumen dengan id_pengajuan
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
        //          "id_pengajuan" => $pengajuan->id,
        //          "nama_dokumen" => $nama_dokumens[$i],
        //          "file" => $fileName,
        //      ]);
        // }

        return redirect()->route('user.index');
    }
}
