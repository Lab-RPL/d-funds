<?php

namespace App\Http\Controllers;

use App\Models\pengajuan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class kourController extends Controller
{
    public function index(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori', 'pengajuan.created_at', 'pengajuan.unit_kerja')
            ->where('pengajuan.IsDelete', 0)
            ->paginate(10000000);

        return view('kour.kour', compact('data'));
    }

    public function discussion(Request $req)
    {
        if (!$req->session()->has('user_id')) {
            return redirect('/');
        }

        $data = DB::table('pengajuan')
            ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
            ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.nama_kategori', 'pengajuan.created_at', 'pengajuan.unit_kerja')
            ->where('pengajuan.IsDelete', 0)
            ->paginate(10000000);

        return view('kour.kour', compact('data'));
    }
}
