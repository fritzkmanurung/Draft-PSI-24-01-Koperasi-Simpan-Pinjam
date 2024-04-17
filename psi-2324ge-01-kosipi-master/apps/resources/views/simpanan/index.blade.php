@extends('layouts.app')

@section('title', 'Simpanan')

@section('content')
    <div class="container">
        <h1>Halaman Simpanan</h1>
        
        <!-- Tampilkan tombol "Tambah Simpanan" hanya untuk pengguna dengan role bendahara -->
        @if(Auth::check() && Auth::user()->role == 'bendahara')
            <div class="mb-3">
                <a href="{{ route('simpanan.create') }}" class="btn btn-primary">Tambah Simpanan</a>
            </div>
        @endif

        <!-- Tampilkan tabel daftar simpanan -->
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nama Anggota</th>
                    <th>Nominal</th>
                    <th>Tanggal Transaksi</th>
                    <th>Jenis</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($simpanans->sortByDesc('created_at') as $simpanan)
                    <tr>
                        <td>{{ $loop->iteration }}</td> <!-- Penomoran -->
                        <td>{{ $simpanan->user->name }}</td>
                        <td>Rp {{ number_format($simpanan->nominal, 0, ',', '.') }},00</td>
                        <td>{{ \Carbon\Carbon::parse($simpanan->tanggal_transaksi)->isoFormat('DD MMMM YYYY') }}</td>
                        <td>
                            @if($simpanan->jenis == 'sp')
                                Simpanan Pokok
                            @elseif($simpanan->jenis == 'sw')
                                Simpanan Wajib
                            @else
                                Simpanan Sukarela
                            @endif
                        </td>
                        <td>{{ $simpanan->status }}</td>
                        <td>
                            <!-- Tombol edit hanya ditampilkan untuk pengguna dengan role bendahara -->
                            @if(Auth::check() && Auth::user()->role == 'bendahara')
                                <a href="{{ route('simpanan.edit', $simpanan->id) }}" class="btn btn-primary">Edit</a>
                            @endif
                            <!-- Button bukti untuk status Verifikasi dan Late -->
                            @if($simpanan->status == 'Verifikasi' || $simpanan->status == 'Verifikasi,Late')
                                <a href="{{ route('simpanan.download', $simpanan->id) }}" class="btn btn-info">Bukti</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
