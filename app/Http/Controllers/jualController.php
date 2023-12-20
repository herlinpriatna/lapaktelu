<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kondisi;
use App\Models\Kategori;
use App\Models\jualModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class JualController extends Controller
{
    public function index()
    {
        return view('jual');
    }

    public function create(){
        $kategoris = Kategori::all();
        $kondisis = Kondisi::all();

        return view('jual', compact('kategoris', 'kondisis'));
    }

    public function store(Request $request){
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|exists:kategoris,id',
            'kondisi' => 'required|exists:kondisis,id',
            'gambar' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $imageName = time().'.'.$request->gambar->extension();
        $request->gambar->move(public_path('images'), $imageName);

        $product = new Produk([
            'nama' => $request->get('nama'),
            'deskripsi' => $request->get('deskripsi'),
            'harga' => $request->get('harga'),
            'kategori_id' => $request->get('kategori'),
            'kondisi_id' => $request->get('kondisi'),
            'user_id' => Auth::id(), // Jika menggunakan autentikasi
            'gambar' => $imageName,
        ]);

        $product->save();

        return redirect('/jual')->with('success', 'Produk berhasil diupload!');
    }

    public function edit($id)
    {
        $product = Produk::findOrFail($id);
        $kategoris = Kategori::all();
        $kondisis = Kondisi::all();

        return view('editproduk', compact('product', 'kategoris', 'kondisis'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required|numeric',
            'kategori' => 'required|exists:kategoris,id',
            'kondisi' => 'required|exists:kondisis,id',
            'gambar' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Produk::findOrFail($id);

        $product->nama = $request->get('nama');
        $product->deskripsi = $request->get('deskripsi');
        $product->harga = $request->get('harga');
        $product->kategori_id = $request->get('kategori');
        $product->kondisi_id = $request->get('kondisi');

        // Handle image update if a new image is provided
        if ($request->has('gambar')) {
            $imageName = time().'.'.$request->gambar->extension();
            $request->gambar->move(public_path('images'), $imageName);
            $product->gambar = $imageName;
        }

        $product->save();

        return redirect('/profil')->with('success', 'Produk berhasil diupdate!');
    }
}
