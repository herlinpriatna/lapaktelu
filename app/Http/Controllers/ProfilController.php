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

    public function showEditProfil()
    {
        $user = Auth::user();
        $produk = Produk::where('user_id', $user->id)->get();

        return view('editprofil', compact('user', 'produk'));
    }

    public function edit($id)
    {
        // Retrieve the user based on the provided ID
        $user = User::findOrFail($id);
        // $produk = Produk::where('user_id', $id)->get();

        // Pass the user data to the view
        return view('editprofil', compact('user'));
    }

    public function update(Request $request, $id)
    {
        // Validate the form data
        $request->validate([
            'namalengkap' => 'required|string|min:6|max:255',
            'username' => 'required|string|min:6|max:8',
            'email' => 'required|email|max:255',
            'alamat' => 'nullable|string|max:255',
            'nomorHP' => 'nullable|numeric',
            'fotoProfil' => 'image|mimes:jpeg,png,jpg,gif|max:2048', // Adjust this based on your image requirements
        ]);

        // Retrieve the user based on the provided ID
        $user = User::findOrFail($id);

        $user->namalengkap = $request->get('namalengkap');
        $user->username = $request->get('username');
        $user->email = $request->get('email');
        $user->alamat = $request->get('alamat');
        $user->nomorHP = $request->get('nomorHP');


        // Handle file upload if a new profile picture is provided
        if ($request->has('fotoProfil')) {
            $imageName = time().'.'.$request->fotoProfil->extension();
            $request->fotoProfil->move(public_path('images'), $imageName);
            $user->fotoProfil = $imageName;
        }

        // Save the changes
        $user->save();

        // Redirect back with a success message
        return redirect()->route('profil.edit', ['id' => $user->id])->with('success', 'Profile updated successfully');
    }
}
