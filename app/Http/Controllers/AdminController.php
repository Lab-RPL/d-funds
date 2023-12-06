<?php

namespace App\Http\Controllers;

use App\Models\admin;
use App\Models\log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    //
    public function index(Request $req){
        if (!$req->session()->has('user_id') || $req->session()->get('user_type') !== 'admin') {
            // Redirect jika tidak ada sesi user_id atau user_type bukan admin
            return redirect('404')->with('error', 'Anda tidak diizinkan untuk mengakses halaman ini.');
        }
    
        $data = admin::where('IsDelete', 0)->paginate(100000000);
    
        return view('admin.index', compact('data'));
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

    $logUser = admin::find($request->session()->get('user_id'));
    Log::create([
        'isi_log' => 'User ' . $user->username . ' berhasil dibuat oleh ' . $logUser->username,
    ]);

    return redirect()->back()->with('message', 'Data Berhasil Ditambahkan');
}


public function edit($id)
{
    $user = admin::findOrFail($id);
    return view('admin.edit', compact('user'));
}

public function update(Request $request, $id)
{
    $user = admin::findOrFail($id);

    // Keep the original username before updating
    $originalUsername = $user->username;

    $user->username = $request->get('username');
    $user->password = bcrypt($request->get('password'));  // encrypt the password before saving it
    $user->user_type = $request->get('user_type');

    $user->save();

    // Create a log entry for the user update
    $logUser = admin::find($request->session()->get('user_id'));
    Log::create([
        'isi_log' => 'User ' . $originalUsername . ' berhasil diperbarui oleh ' . $logUser->username,
    ]);

    return redirect()->route('admin.index')->with('message', 'User Berhasil Di Update');
}





// public function edit($id)
// {
//     $user = Admin::findOrFail($id); // findOrFail akan menghasilkan error jika user tidak ditemukan
//     // mengirim data user ke view
//     return view('admin.index', compact('user')); // menggunakan fungsi compact untuk mempersingkat kode
// }



// public function update(Request $request, $id)
// {
//     $request->validate([
//         'username' => 'required',
//         'password' => 'required',
//         'user_type' => 'required'
//     ]);

//     $user = Admin::find($id);

//     $user->username = $request->username;
//     $user->password = bcrypt($request->password); // encrypt password before saving
//     $user->user_type = $request->user_type;

//     $user->save();

//     return response()->json([
//         'message' => 'User updated successfully!'
//     ], 200);
// }


public function destroy($id)
{
    $admin_entry = admin::where('id_user', $id)->first();

    if (!$admin_entry) {
        return redirect()
            ->back()
            ->with('error', 'User not found');
    }

    // Soft delete the user entry
    $admin_entry->IsDelete = 1;
    $admin_entry->save();

    // Create a log entry for the user deletion
    $logUser = admin::find(session('user_id'));
    Log::create([
        'isi_log' => 'User ' . $admin_entry->username . ' berhasil dihapus oleh ' . $logUser->username,
    ]);

    return redirect()
        ->back()
        ->with('message', 'Data User Berhasil Dihapus');
}



}
