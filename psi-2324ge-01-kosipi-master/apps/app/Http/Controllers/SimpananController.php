<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Simpanan;
use App\Models\User;
use Dompdf\Dompdf;
use Dompdf\Options;

class SimpananController extends Controller
{
    public function index()
    {
        $simpanans = Simpanan::all();
        return view('simpanan.index', compact('simpanans'));
    }

    public function create()
    {
        $anggota = User::where('role', 'anggota')->get();
        return view('simpanan.create', compact('anggota'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'anggota' => 'required|array',
            'anggota.*' => 'exists:users,id',
            'nominal' => 'required|numeric',
            'tanggal' => 'required|date',
            'jenis' => 'required|in:sp,sw,ss',
            'status' => 'required|in:Verifikasi,Request', // Menambah validasi untuk status
        ]);

        foreach ($request->anggota as $userId) {
            $kodeTransaksi = $request->jenis . str_pad(Simpanan::where('jenis', $request->jenis)->count() + 1, 3, '0', STR_PAD_LEFT);
            Simpanan::create([
                'kode_transaksi' => $kodeTransaksi,
                'membership_number' => User::findOrFail($userId)->membership_number, // Menggunakan membership_number dari user
                'nominal' => $request->nominal,
                'tanggal_transaksi' => $request->tanggal,
                'jenis' => $request->jenis,
                'status' => $request->status, // Menambah status
            ]);
        }

        return redirect()->route('simpanan.index')->with('success', 'Simpanan berhasil ditambahkan!');
    }

    public function edit(Simpanan $simpanan)
    {
        // Cek otorisasi
        if (auth()->user()->role !== 'bendahara') {
            abort(403, 'Unauthorized');
        }

        // Load view untuk edit simpanan
        return view('simpanan.edit', compact('simpanan'));
    }

    public function bukti(Simpanan $simpanan)
    {
        // Load view untuk bukti simpanan
        return view('simpanan.bukti', compact('simpanan'));
    }
    
    public function download(Simpanan $simpanan)
    {
        $dompdf = new Dompdf();

        // Membuat HTML untuk dokumen PDF
        $html = view('simpanan.bukti', compact('simpanan'))->render();

        // Memuat HTML ke Dompdf
        $dompdf->loadHtml($html);

        $dompdf->setPaper('A4', 'portrait');

        // Render PDF (membuat PDF)
        $dompdf->render();

        // Mengirimkan dokumen PDF sebagai respons
        $filename = 'Bukti_Pembayaran_Simpanan.pdf';
        $dompdf->stream($filename, array("Attachment" => false));
    }

    public function update(Request $request, Simpanan $simpanan)
    {
        // Validasi input
        $request->validate([
            'nominal' => 'required|numeric',
            'tanggal_transaksi' => 'required|date',
            'jenis' => 'required|in:sp,sw,ss',
            'status' => 'required|array', // Memastikan input status adalah array
            'status.*' => Rule::in(['Verifikasi', 'Request', 'Late']), // Memastikan setiap nilai status valid
        ]);

        // Update data simpanan
        $simpanan->update([
            'nominal' => $request->nominal,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'jenis' => $request->jenis,
            'status' => implode(',', $request->status), // Mengonversi array status menjadi string yang dipisahkan koma
        ]);

        // Redirect dengan pesan sukses
        return redirect()->route('simpanan.index')->with('success', 'Simpanan berhasil diperbarui!');
    }
}