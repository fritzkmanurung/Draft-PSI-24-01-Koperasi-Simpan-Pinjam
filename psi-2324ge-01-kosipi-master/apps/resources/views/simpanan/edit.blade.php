@extends('layouts.app')

@section('title', 'Edit Simpanan')

@section('content')
    <div class="container">
        <h1>Edit Simpanan</h1>
        
        <!-- Form untuk mengedit simpanan -->
        <form action="{{ route('simpanan.update', $simpanan->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="nominal">Nominal:</label>
                <input type="text" id="nominal" name="nominal" value="{{ $simpanan->nominal }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="tanggal_transaksi">Tanggal Transaksi:</label>
                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $simpanan->tanggal_transaksi }}" class="form-control">
            </div>
            <div class="form-group">
                <label for="jenis">Jenis:</label>
                <select name="jenis" id="jenis" class="form-control">
                    <option value="sp" {{ $simpanan->jenis == 'sp' ? 'selected' : '' }}>Simpanan Pokok</option>
                    <option value="sw" {{ $simpanan->jenis == 'sw' ? 'selected' : '' }}>Simpanan Wajib</option>
                    <option value="ss" {{ $simpanan->jenis == 'ss' ? 'selected' : '' }}>Simpanan Sukarela</option>
                </select>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status[]" id="status" class="form-control" multiple> <!-- Menggunakan atribut multiple untuk multi-select -->
                    <option value="Verifikasi" {{ in_array('Verifikasi', explode(',', $simpanan->status)) ? 'selected' : '' }}>Verifikasi</option>
                    <option value="Request" {{ in_array('Request', explode(',', $simpanan->status)) ? 'selected' : '' }}>Request</option>
                    <option value="Late" {{ in_array('Late', explode(',', $simpanan->status)) ? 'selected' : '' }}>Late</option> <!-- Menambah opsi Late -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Update Simpanan</button>
        </form>
    </div>
@endsection
