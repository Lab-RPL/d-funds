<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(Request $req){
        if(!$req->session()->has('user_id')){
            return redirect('/');
        }

        $data = admin::where('IsDelete',0)->paginate(100000000);

        return view('admin.index',compact('data'));
    }

    public function create()
{
    return view('admin.index');
}

public function store(Request $request)
{
    // $request->validate([
    //     'username' => 'required|max:255',
    //     'password' => 'required|min:8',
    //     'user_type' => 'required',
    // ]);

    $user = new admin;
    $user->username = $request->username;
    $user->password = Hash::make($request->password);
    $user->user_type = $request->user_type;

    $user->save();

    return redirect()->back()->with('message', 'Data Berhasil Ditambahkan');
}



}
