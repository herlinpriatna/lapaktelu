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
    public function index()
    {
        $simpans = Simpan::all();
        return view("home", ['produkList' => $simpans]);
    }

    public function create(Request $request, $id)
    {
        $simpans = Simpan::find($id);

        if (!$simpans) {
            abort(404);
        }

        $simpan = $request->session()->get('simpan', []);
        $simpan[$id] = $simpans;

        $request->session()->put('simpan', $simpan);

        return redirect()->route('simpan.show')->with('success', 'Produk berhasil ditambahkan ke simpan.');
    }

    // public function show(Request $request)
    // {
    //     $simpan = $request->session()->get('simpan', []);

    //     // Ambil daftar produk berdasarkan id yang ada di simpan
    //     $produkList = Simpan::whereIn('id', array_keys($simpan))->get();

    //     return view('simpan', ['produkList' => $produkList]);
    // }

    public function show()
    {

        // Dapatkan pengguna yang saat ini diotentikasi
        $user = Auth::user();

        // Dapatkan catatan Simpan untuk pengguna saat ini
        $simpanRecords = Simpan::where('user_id', $user->id)->get();

        return view('simpan', compact('simpanRecords', 'user'));
    }
}
