@extends('layouts.app')

@section('title', 'Pinjaman')

@section('content')
    <div class="container">
        <h1>Halaman Pinjaman</h1>
        
        <!-- Tampilkan tombol "Tambah Pinjaman" hanya untuk pengguna dengan role bendahara -->
        @if(Auth::check() && Auth::user()->role == 'bendahara')
            <div class="mb-3">
                <a href="{{ route('pinjaman.create') }}" class="btn btn-primary">Tambah Pinjaman</a>
            </div>
        @endif

        <!-- Tampilkan tabel pinjaman -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th> <!-- Kolom penomoran -->
                    <th>Nama</th>
                    <th>Tanggal Transaksi</th>
                    <th>Total Utang</th>
                    <th>Status</th>
                    <th>Aksi</th> <!-- Kolom untuk aksi -->
                </tr>
            </thead>
            <tbody>
                <!-- Iterasi untuk menampilkan data pinjaman -->
                @foreach($pinjamans->sortByDesc('created_at') as $index => $pinjaman)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Penomoran -->
                        <td>{{ $pinjaman->user->name }}</td>
                        <td>{{ \Carbon\Carbon::parse($pinjaman->tanggal_transaksi)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>Rp {{ number_format($pinjaman->total_utang, 0, ',', '.') }},00</td>
                        <td>{{ $pinjaman->status }}</td>
                        <td>
                            <!-- Tambahkan tombol untuk membayar pinjaman jika status bukan "Verifikasi" -->
                            @if(Auth::check() && Auth::user()->role == 'bendahara' && $pinjaman->status != 'Verifikasi')
                                <a href="{{ route('pinjaman.bayar', $pinjaman->id) }}" class="btn btn-success">Bayar</a>
                            @endif
                            <a href="{{ route('pinjaman.riwayat', $pinjaman->id) }}" class="btn btn-info">Riwayat</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
