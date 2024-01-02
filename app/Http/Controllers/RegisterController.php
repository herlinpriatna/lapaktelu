<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index(){
        return view('auth/register');
    }

    public function store(Request $request){
        $request->validate([
            'username' => 'required|string|min:6|max:8',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|min:6|max:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ],[
            'username.required' => 'Username harus mengandung minimal 6 karakter tanpa spasi',
            'email.required' => 'Email wajib diisi',
            "password.required" => 'Password harus mengandung minimal 6 karakter berbeda terdiri dari huruf besar, kecil, angka dan simbol'
        ]);
        
        $data['username'] = $request->username;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);

        User::create($data);
        $request->session()->flash('success', 'Registrasi berhasil! Silahkan login');
        return redirect(route('login'));
    }

  
}
