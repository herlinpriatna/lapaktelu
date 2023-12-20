<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use Illuminate\Http\Request;

class KategoriController extends Controller
{
    public function index(){
        return view('kategorislug');
    }

    public function showAllKategori(){
        $kategori = Kategori::all();
        return view('kategori', ['kategori' => $kategori]);
    }
    public function show($slug)
    {
        // Mengambil data kategori berdasarkan slug
        $kategori = Kategori::where('slug', $slug)->first();

        // Memeriksa apakah kategori ditemukan
        if (!$kategori) {
            abort(404); // Kategori tidak ditemukan, bisa disesuaikan dengan kebutuhan Anda
        }

        // Mengirim data kategori ke view
        return view('kategorislug', ['kategori' => $kategori]);
    }
}
