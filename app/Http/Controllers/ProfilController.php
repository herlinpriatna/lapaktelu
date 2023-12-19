<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produk;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfilController extends Controller
{
    public function index(){
        return view('profil');
    }
    public function showProfil()
    {
        $user = Auth::user();
        $produk = Produk::where('user_id', $user->id)->get();

        return view('profil', compact('user', 'produk'));
    }

    public function showUserProfil($id)
    {
        $user = User::findOrFail($id);
        $produk = Produk::where('user_id', $id)->get();

        return view('profil', compact('user', 'produk'));
    }
}
