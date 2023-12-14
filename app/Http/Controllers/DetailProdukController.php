<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kondisi;
use App\Models\Kategori;

class DetailProdukController extends Controller
{
    public function show($id)
    {
        $produks = Produk::find($id);

        $kondisis = Kondisi::find($id);

        $kategoris = Kategori::find($id);

        return view('detailproduk', compact('produks', 'kondisis', 'kategoris'));
    }
}
