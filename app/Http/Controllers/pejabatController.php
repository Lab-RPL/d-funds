<?php

namespace App\Http\Controllers;

use App\Models\dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class pejabatController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id') ||  $req->session()->get('user_type') !== 'pejabat') {
            return redirect('404');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori', 'pengajuan.created_at', 'pengajuan.unit_kerja')
            ->where('pengajuan.IsDelete', 0)
            ->paginate(10000000);

        return view('pejabat.pejabat', compact('data'));
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


        return view('pejabat.lihatpejabat', compact('data', 'dokumens', 'discusses'));
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
