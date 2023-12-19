<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class SearchController extends Controller
{
    
    public function index()
    {
        $produks = Produk::all();
        return view("home", ['produkList' => $produks]);
    }
    public function search(Request $request)
    {
        $search = $request->input('query');
        $produks = Produk::where('nama', 'like', "%$search%")->get();

        if ($produks->isEmpty()) {
            return view("search", ['produkList' => $produks]);
        }

        return view("search", ['produkList' => $produks]);
    }
}
