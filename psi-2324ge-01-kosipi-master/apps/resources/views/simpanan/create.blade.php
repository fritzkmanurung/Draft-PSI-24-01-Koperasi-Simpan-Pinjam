@extends('layouts.app')

@section('title', 'Tambah Simpanan')

@section('content')
    <div class="container">
        <h1>Tambah Simpanan</h1>
        <!-- Formulir untuk menambahkan simpanan -->
        <form action="{{ route('simpanan.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="anggota">Nama Anggota</label>
                <select name="anggota[]" id="anggota" class="form-control" multiple required>
                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nominal">Nominal Simpanan</label>
                <input type="number" name="nominal" id="nominal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="tanggal">Tanggal Transaksi</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="jenis">Jenis Simpanan</label>
                <select name="jenis" id="jenis" class="form-control" required>
                    <option value="sp">Simpanan Pokok</option>
                    <option value="sw">Simpanan Wajib</option>
                    <option value="ss">Simpanan Sukarela</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select name="status" id="status" class="form-control" required>
                    <option value="Verifikasi">Verifikasi</option>
                    <option value="Request">Request</option>
                </select>
            </div>
            
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
