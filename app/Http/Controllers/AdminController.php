<?php

namespace App\Http\Controllers;

use App\Models\admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    public function index(Request $req){
        if(!$req->session()->has('user_id')){
            return redirect('/');
        }

        $data = admin::where('IsDelete',0)->paginate(100000000);

        return view('index',compact('data'));
    }

}
