<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    public function index(){
        return view('auth/login');
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|max:255|email',
            'password' => 'required|min:6|max:8|regex:/^.*(?=.{3,})(?=.*[a-zA-Z])(?=.*[0-9])(?=.*[\d\x])(?=.*[!$#%]).*$/',
        ],[
            'email.required' => 'Email wajib diisi',
            "password.required" => 'Password harus mengandung minimal 6 karakter berbeda terdiri dari huruf besar, kecil, angka dan simbol'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            // Check if the authenticated user is an admin
            if (Auth::user()->email === 'admin@gmail.com') {
                return redirect()->intended('admin'); // Redirect to admin home page
            } else {
                return redirect()->intended('home'); // Redirect to user home page
            }
        }

        return back()->with('error', 'Email dan/atau password Anda salah!');
    }

    public function logout(Request $request){
        Auth::logout();
        request()->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('/');

    }
    
}
