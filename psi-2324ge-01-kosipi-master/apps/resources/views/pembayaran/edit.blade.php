@extends('layouts.app')

@section('title', 'Edit Pembayaran')

@section('content')
    <div class="container">
        <h1>Edit Pembayaran</h1>
        <form action="{{ route('pembayaran.update', $pembayaran->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_transaksi">Kode Transaksi:</label>
                <input type="text" id="kode_transaksi" name="kode_transaksi" value="{{ $pembayaran->kode_transaksi }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_transaksi">Tanggal Pembayaran:</label>
                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ $pembayaran->tanggal_transaksi }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nominal_angsuran">Nominal Angsuran:</label>
                <input type="number" id="nominal_angsuran" name="nominal_angsuran" value="{{ $pembayaran->nominal_angsuran }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total_utang_sebelum">Total Utang Sebelum Pembayaran:</label>
                <input type="number" id="total_utang_sebelum" name="total_utang_sebelum" value="{{ $pembayaran->total_utang_sebelum }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total_utang_sesudah">Total Utang Sesudah Pembayaran:</label>
                <input type="number" id="total_utang_sesudah" name="total_utang_sesudah" value="{{ $pembayaran->total_utang_sesudah }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status[]" id="status" class="form-control" multiple>
                    <option value="Request" {{ in_array('Request', explode(',', $pembayaran->status)) ? 'selected' : '' }}>Request</option>
                    <option value="Verifikasi" {{ in_array('Verifikasi', explode(',', $pembayaran->status)) ? 'selected' : '' }}>Verifikasi</option>
                    <option value="Late" {{ in_array('Late', explode(',', $pembayaran->status)) ? 'selected' : '' }}>Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>
@endsection
