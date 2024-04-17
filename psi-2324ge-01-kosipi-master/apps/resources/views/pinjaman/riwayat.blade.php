@extends('layouts.app')

@section('title', 'Riwayat Pembayaran')

@section('content')
    <div class="container">
        <h1>Riwayat Pembayaran</h1>
        
        <!-- Informasi Pinjaman -->
        @if($riwayat_pembayaran->isEmpty())
            <div class="alert alert-info" role="alert">
                Belum ada Pembayaran.
            </div>
        @else
            <div class="mb-3">
                <h3>Informasi Pinjaman:</h3>
                <ul>
                    <li><strong>Kode Transaksi:</strong> {{ $riwayat_pembayaran->first()->kode_transaksi }}</li>
                    <li><strong>Tanggal Transaksi:</strong> {{ \Carbon\Carbon::parse($riwayat_pembayaran->first()->pinjaman->tanggal_transaksi)->isoFormat('DD MMMM YYYY') }}</li>
                    <li><strong>Nominal Pinjaman:</strong> Rp {{ number_format($riwayat_pembayaran->first()->pinjaman->nominal, 0, ',', '.') }},00</li>
                </ul>
            </div>

            <table class="table">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Kode Pembayaran</th>
                        <th>Tanggal Pembayaran</th>
                        <th>Nominal Angsuran</th>
                        <th>Total Utang Sebelum</th>
                        <th>Total Utang Sesudah</th>
                        <th>Status Pembayaran</th>
                        <th>Aksi</th> <!-- Kolom untuk aksi -->
                    </tr>
                </thead>
                <tbody>
                    @foreach($riwayat_pembayaran as $index => $pembayaran)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $pembayaran->kode_pembayaran }}</td> <!-- Menampilkan kode pembayaran -->
                            <td>{{ \Carbon\Carbon::parse($pembayaran->tanggal_transaksi)->isoFormat('DD MMMM YYYY') }}</td>
                            <td>Rp {{ number_format($pembayaran->nominal_angsuran, 0, ',', '.') }},00</td>
                            <td>Rp {{ number_format($pembayaran->total_utang_sebelum, 0, ',', '.') }},00</td>
                            <td>Rp {{ number_format($pembayaran->total_utang_sesudah, 0, ',', '.') }},00</td>
                            <td>{{ $pembayaran->status }}</td> <!-- Menampilkan status pembayaran -->
                            <td>
                                <!-- Tombol edit hanya ditampilkan untuk pengguna dengan role bendahara -->
                                @if(Auth::check() && Auth::user()->role == 'bendahara')
                                    <a style="width: 100px; margin-bottom:5px;" href="{{ route('pembayaran.edit', $pembayaran->id) }}" class="btn btn-primary">Edit</a> <!-- Tombol edit dengan link ke halaman edit -->
                                @endif
                                <!-- Tampilkan tombol "Bukti" hanya jika status pembayaran adalah "Verifikasi" atau "Late" -->
                                @if($pembayaran->status == 'Verifikasi' || $pembayaran->status == 'Late')
                                    <a style="width: 100px;" href="{{ route('pembayaran.download', $pembayaran->id) }}" class="btn btn-info">Bukti</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            <!-- Status Lunas -->
            @if($riwayat_pembayaran->last()->total_utang_sesudah == 0 && ($riwayat_pembayaran->last()->status == 'Verifikasi' || $riwayat_pembayaran->last()->status == 'Late'))
                <div class="alert alert-success" id="lunasAlert" role="alert">
                    Pinjaman telah lunas.
                </div>
            @endif
        @endif
    </div>

    <script>
        // Menghilangkan pesan "Pinjaman telah lunas" setelah 5 detik
        setTimeout(function() {
            document.getElementById('lunasAlert').style.display = 'none';
        }, 5000);
    </script>
@endsection
