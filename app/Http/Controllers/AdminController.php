<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index(){
        return view('admin');
    }
    
    public function show(){
        $product = Produk::all();
        return view('admin', compact('products'));
    }

    public function confirmProduct($productId)
    {
        $product = Produk::find($productId);

        if ($product) {
            $product->status = 'accepted';
            $product->save();

            return redirect('/admin')->with('success', 'Produk dikonfirmasi!');
        }

    return redirect('/admin')->with('error', 'Produk tidak ditemukan.');
    }

    public function rejectProduct($productId){
        $product = Produk::find($productId);

        if ($product) {
            $product->status = 'rejected';
            $product->save();

            return redirect('/admin')->with('success', 'Produk berhasil ditolak');
        }
    }

    public function cancelConfirm($productId){
        $product = Produk::find($productId);

        if ($product) {
            $product->status = 'pending';
            $product->save();

            return redirect('/admin')->with('success', 'Produk berhasil dibatalkan');
        }
    }
    
    
}