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

        return view('editprofil', compact('user'));
    }


    public function updateProfile(Request $request)
    {
        // Validate the form data
        $request->validate([
            'fotoProfil' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'namalengkap' => 'nullable|string|max:255',
            'username' => 'required|string|max:255|unique:users,username,' . Auth::id(),
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'alamat' => 'nullable|string',
            'nomorHP' => 'nullable|string',
        ]);

        // Update the user profile
        Auth::user()->update([
            'namalengkap' => $request->input('namalengkap'),
            'username' => $request->input('username'),
            'email' => $request->input('email'),
            'alamat' => $request->input('alamat'),
            'nomorHP' => $request->input('nomorHP'),
        ]);

        // Handle profile picture upload if needed
        if ($request->hasFile('fotoProfil')) {
            $path = $request->file('fotoProfil')->store('profile_images', 'public');
            $userData['fotoProfil'] = $path;
        }

        Auth::user()->update($userData);
        // Redirect back with a success message
        return redirect()->back()->with('success', 'Profile updated successfully.');
    }
}
