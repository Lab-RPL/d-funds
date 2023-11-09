<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    //
    public function login()
    {
        return view('login');
    }

    public function masuk(Request $req)
    {
        $data = DB::table('users')
            ->where('username', '=', $req->username)
            ->first(['id_user', 'user_type', 'password']);

        if ($data && Hash::check($req->password, $data->password)) {
            $req->session()->put('user_id', $data->id_user);
            $req->session()->put('user_type', $data->user_type);

            if ($data->user_type == 'admin') {
                return redirect('/dashboard');
            } 
            else if ($data->user_type == 'pejabat'){
                return redirect('/pejabat');
            }
            else if ($data->user_type == 'kour'){
                return redirect('/kour');
            }
            else if ($data->user_type == 'pelaksana'){
                return redirect('/pelaksana');
            }
            else if ($data->user_type == 'user'){
                return redirect('/user');
            }else{
                return redirect('/');
            }
        } else {
            return redirect('/')->with('error', 'Invalid Login Details');
        }
    }

    public function logout(Request $req){
        $req->session()->flush('user_id');
        return redirect('/');
    }
}
