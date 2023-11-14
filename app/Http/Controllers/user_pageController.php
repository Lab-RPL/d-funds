<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class user_pageController extends Controller
{
    public function index(Request $req) {
        if(!$req->session()->has('user_id')){
            return redirect('/');
        }

        $data = DB::table('pengajuan')
        ->join('kategori', 'pengajuan.id_kategori', '=', 'kategori.id_kategori')
        ->select('pengajuan.*', 'pengajuan.tentang', 'kategori.kategori')
        ->where('pengajuan.IsDelete',0)
        ->paginate(10000000);    

        return view('user.user',compact('data'));
    }

    public function getKategoriDetail($id_kategori) {
        $data = DB::table('kategori')->where('id_kategori', $id_kategori)->first();
        return response()->json($data);
    }
    
    public function create() {
        $kategoris = DB::table('kategori')->get();

        return view('user.pengajuan',compact('kategoris'));
    }

    public function store() {
        
    }
}
