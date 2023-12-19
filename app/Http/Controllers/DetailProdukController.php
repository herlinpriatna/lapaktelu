<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\User;
use App\Models\Kondisi;
use App\Models\Kategori;

class DetailProdukController extends Controller
{
    public function show($id, $nama)
    {
        $produk = Produk::find($id);

        if ($produk && $produk->nama == $nama) {
            $user = User::find($produk->user_id);
            $kondisi = Kondisi::find($produk->kondisi_id);
            $kategori = Kategori::find($produk->kategori_id);

            return view('detailproduk', compact('produk', 'user', 'kondisi', 'kategori'));
        } else {
            return abort(404);
        }
    }
    
}
