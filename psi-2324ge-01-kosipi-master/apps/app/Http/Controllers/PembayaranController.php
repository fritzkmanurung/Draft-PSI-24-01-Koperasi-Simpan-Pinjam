<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pinjaman;
use App\Models\Pembayaran;
use Illuminate\Support\Facades\DB;
use Dompdf\Dompdf;
use Dompdf\Options;

class PembayaranController extends Controller
{
    public function bayar(Pinjaman $pinjaman)
    {
        // Menghitung total utang sesudah pembayaran
        $bunga = 0.03; // Bunga tetap 3%
        
        // Jika jangka waktu adalah 1, total angsuran sama dengan total utang sisa
        if ($pinjaman->jangka_waktu == 1) {
            $total_angsuran = $pinjaman->total_utang;
        } else {
            $total_angsuran = $pinjaman->nominal_angsuran;
        }
    
        $total_utang_sesudah = $pinjaman->total_utang - $total_angsuran + (($pinjaman->total_utang - $total_angsuran) * $bunga);
    
        // Mengirim data pinjaman dan total utang sesudah pembayaran ke view
        return view('pinjaman.bayar', compact('pinjaman', 'total_utang_sesudah', 'total_angsuran'));
    }
    

    public function store(Request $request, Pinjaman $pinjaman)
    {
        $request->validate([
            // Validasi sesuai kebutuhan
        ]);

        // Hitung total angsuran
        if ($pinjaman->jangka_waktu == 1) {
            $total_angsuran = $pinjaman->total_utang;
        } else {
            $total_angsuran = $pinjaman->nominal_angsuran;
        }

        // Hitung total utang sebelum pembayaran
        $total_utang_sebelum = $pinjaman->total_utang;

        // Hitung total utang sesudah pembayaran
        $bunga = 0.03; // Bunga tetap 3%
        $total_utang_sesudah = $pinjaman->total_utang - $total_angsuran + (($pinjaman->total_utang - $total_angsuran) * $bunga);

        // Generate kode pembayaran
        $kode_pembayaran = 'PAY' . uniqid();

        // Jika total utang menjadi 0, update status menjadi "Verifikasi"
        $status = $total_utang_sesudah == 0 ? 'Verifikasi' : $pinjaman->status;

        // Perbarui data pinjaman
        $pinjaman->update([
            'jangka_waktu' => $pinjaman->jangka_waktu - 1,
            'total_utang' => $total_utang_sesudah,
            'status' => $status,
        ]);

        // Simpan data pembayaran
        Pembayaran::create([
            'pinjaman_id' => $pinjaman->id,
            'kode_transaksi' => $pinjaman->kode_transaksi,
            'kode_pembayaran' => $kode_pembayaran,
            'tanggal_transaksi' => $request->tanggal_transaksi,
            'nominal_angsuran' => $total_angsuran,
            'total_utang_sebelum' => $total_utang_sebelum,
            'total_utang_sesudah' => $total_utang_sesudah,
            'status' => implode(',', $request->status), // Menggunakan implode untuk menyimpan status sebagai string terpisah
        ]);

        return redirect()->route('pinjaman.index')->with('success', 'Pembayaran pinjaman berhasil!');
    }
    
    public function riwayat(Pinjaman $pinjaman)
    {
        $riwayat_pembayaran = Pembayaran::where('kode_transaksi', $pinjaman->kode_transaksi)->get();
        return view('pinjaman.riwayat', compact('riwayat_pembayaran'));
    }

    public function edit(Pembayaran $pembayaran)
    {
        return view('pembayaran.edit', compact('pembayaran'));
    }

    public function update(Request $request, Pembayaran $pembayaran)
    {
        $request->validate([
            'status' => 'required', // Validasi untuk status
        ]);

        $pembayaran->update([
            'status' => implode(',', $request->status), // Update status pembayaran
        ]);

        return redirect()->route('pinjaman.riwayat', $pembayaran->pinjaman_id)->with('success', 'Status pembayaran berhasil diperbarui!');
    }

    // public function bukti(Pembayaran $pembayaran)
    // {
    //     // Ambil data peminjam berdasarkan pinjaman terkait pembayaran
    //     $peminjam = Pinjaman::find($pembayaran->pinjaman->peminjam_id);

    //     return view('pembayaran.bukti', compact('pembayaran', 'peminjam'));
    // }

    public function download(Pembayaran $pembayaran)
{
    // Buat objek Dompdf
    $dompdf = new Dompdf();

    // Render view ke dalam PDF
    $html = view('pembayaran.bukti', compact('pembayaran'))->render();
    $dompdf->loadHtml($html);

    // Atur ukuran dan orientasi halaman
    $dompdf->setPaper('A4', 'portrait');

    // Render PDF
    $dompdf->render();

    // Generate nama file PDF
    $filename = 'Bukti_Pembayaran_' . $pembayaran->kode_pembayaran . '.pdf';

    // Output PDF untuk di-download
    $dompdf->stream($filename, array("Attachment" => false));
}
}
