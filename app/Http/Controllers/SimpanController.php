<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Simpan;
use App\Models\User;
use App\Models\Produk;

class SimpanController extends Controller
{
    public function create($id)
    {
        $produk = Produk::findOrFail($id);

        Simpan::create([
            'user_id' => auth()->id(),
            'produk_id' => $produk->id,
        ]);

        return redirect()->back()->with('success', 'Produk berhasil disimpan!');
    }

    public function show()
    {
        $user = Auth::user();

        $simpanRecords = Simpan::where('user_id', $user->id)->get();

        return view('simpan', compact('simpanRecords', 'user'));
    }
}
