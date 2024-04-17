<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\User;

class PinjamanController extends Controller
{
    public function index()
    {
        $pinjamans = Pinjaman::all(); // Mengambil semua data pinjaman dari database
        return view('pinjaman.index', compact('pinjamans'));
    }

    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('pinjaman.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'nama' => 'required',
            'nominal' => 'required|numeric',
            'bunga' => 'required|numeric',
            'jangka_waktu' => 'required|numeric',
            'nominal_angsuran' => 'required|numeric',
            'harga_barang_jaminan' => 'required|numeric',
            'total_utang' => 'required|numeric',
        ]);

        // Hitung total utang
        $totalUtang = $request->nominal + ($request->nominal * $request->bunga / 100);

        Pinjaman::create([
            'kode_transaksi' => 'p' . str_pad(Pinjaman::count() + 1, 3, '0', STR_PAD_LEFT),
            'user_id' => $request->nama,
            'tanggal_transaksi' => $request->tanggal,
            'nominal' => $request->nominal,
            'bunga' => $request->bunga,
            'jangka_waktu' => $request->jangka_waktu,
            'nominal_angsuran' => $request->nominal_angsuran,
            'harga_barang_jaminan' => $request->harga_barang_jaminan,
            'total_utang' => $totalUtang,
            'status' => 'Request', // Default status Request
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pinjaman berhasil ditambahkan!');
    }
}
