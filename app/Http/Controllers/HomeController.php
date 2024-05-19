<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(){
        return view("home");
    }

    public function Jual(){
        return view("jual");
    }

    public function login(){
        return view("auth/login");
    }

    public function detailKategori(){
        return view("detailkategori");
    }

    public function showConfirmedProducts()
    {
        $confirmedProducts = Produk::where('status', 'accepted')->get();

        return view('home', compact('confirmedProducts'));
    }

    
}
