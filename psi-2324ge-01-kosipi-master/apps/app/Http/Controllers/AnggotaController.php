<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AnggotaController extends Controller
{
    public function index()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('anggota.index', compact('anggota'));
    }

    public function create()
    {
        $latestMembershipNumber = User::max('membership_number');
        $generated_membership_number = $latestMembershipNumber ? 'ksp' . sprintf('%04d', substr($latestMembershipNumber, 3) + 1) : 'ksp0001';
        return view('anggota.create', compact('generated_membership_number'));
    }

    public function store(Request $request)
    {
        $request->validate([
            // Atur aturan validasi sesuai kebutuhan
        ]);

        if (User::where('username', $request->username)->exists()) {
            return redirect()->back()->withInput()->with('error', 'Username sudah digunakan. Silakan gunakan username lain.');
        }

        // Simpan data ke dalam database dengan status "Aktif"
        $user = User::create([
            'membership_number' => $request->membership_number,
            'koperasi_id' => $request->koperasi_id,
            'username' => $request->username,
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'place_of_birth' => $request->place_of_birth,
            'date_of_birth' => $request->date_of_birth,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'institution' => $request->institution,
            'work_unit' => $request->work_unit,
            'role' => 'anggota',
            'status' => 'Aktif', // Set status sebagai "Aktif"
        ]);

        // Isi kolom "joined" dengan tanggal saat ini
        $user->update(['joined_at' => now()]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $anggota = User::findOrFail($id);
        return view('anggota.edit', compact('anggota'));
    }

    public function update(Request $request, $id)
    {
        $anggota = User::findOrFail($id);
        
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string',
            'status' => 'required|in:Aktif,Nonaktif', // Validasi status
        ]);

        $anggota->update([
            'name' => $request->name,
            'address' => $request->address,
            'status' => $request->status,
        ]);

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $anggota = User::findOrFail($id);
        $anggota->delete();

        return redirect()->route('anggota.index')->with('success', 'Anggota berhasil dihapus!');
    }
}
