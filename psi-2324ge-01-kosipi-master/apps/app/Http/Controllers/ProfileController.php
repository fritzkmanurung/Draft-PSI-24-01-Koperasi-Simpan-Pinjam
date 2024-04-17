<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function index()
    {
        // Logic untuk menampilkan profil pengguna
        $user = Auth::user();

        // Kirim data pengguna ke halaman profil
        return view('profile.index', compact('user'));    
    }

    public function edit()
    {
        // Logic untuk mengambil data profil pengguna untuk diedit
        $user = Auth::user();

        // Kirim data pengguna ke halaman pengeditan profil
        return view('profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        // Validasi data yang diterima dari form
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'username' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:20048', // Validasi foto
        ]);

        // Ambil data pengguna yang sedang login
        $user = auth()->user();

        // Update data pengguna
        $user->name = $request->name;
        $user->email = $request->email;
        $user->username = $request->username;

        // Update foto profil jika ada
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photoName = time().'.'.$photo->extension();
            $photo->move(public_path('photos'), $photoName);
            $user->photo = $photoName;
        }

        // Simpan perubahan
        $user->save();

        // Redirect kembali ke halaman profil
        return redirect()->route('profile.index')->with('success', 'Profil berhasil diperbarui.');
    }
}
