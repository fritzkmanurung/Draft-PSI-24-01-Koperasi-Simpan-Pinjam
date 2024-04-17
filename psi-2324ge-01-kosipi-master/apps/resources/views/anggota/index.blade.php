@extends('layouts.app')

@section('title', 'Anggota')

@section('content')
    <div class="container">
        <h1>Halaman Anggota</h1>
        
        <!-- Tampilkan tombol "Tambah Anggota" hanya untuk pengguna dengan role bendahara atau admin -->
        @if(Auth::check() && (Auth::user()->role == 'bendahara' || Auth::user()->role == 'admin'))
            <div class="mb-3">
                <a href="{{ route('anggota.create') }}" class="btn btn-primary">Tambah Anggota</a>
            </div>
        @endif

        <!-- Tampilkan tabel anggota -->
        <table class="table">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Nomor Anggota</th>
                    <th>Nama</th>
                    <th>Alamat</th>
                    <th>Status</th> <!-- Kolom untuk status -->
                    <th>Aksi</th> <!-- Kolom untuk tombol aksi -->
                </tr>
            </thead>
            <tbody>
                @foreach($anggota as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->membership_number }}</td>
                        <td>{{ $member->name }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->status }}</td> <!-- Menampilkan status anggota -->
                        <td>
                            <!-- Tombol untuk mengedit anggota hanya untuk bendahara atau admin -->
                            @if(Auth::check() && (Auth::user()->role == 'bendahara' || Auth::user()->role == 'admin'))
                                <a href="{{ route('anggota.edit', $member->id) }}" class="btn btn-primary">Edit</a>
                            @endif
                            
                            <!-- Tombol untuk menghapus anggota hanya untuk bendahara atau admin -->
                            @if(Auth::check() && (Auth::user()->role == 'bendahara' || Auth::user()->role == 'admin'))
                                <form action="{{ route('anggota.destroy', $member->id) }}" method="POST" style="display: inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus anggota ini?')">Delete</button>
                                </form>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
