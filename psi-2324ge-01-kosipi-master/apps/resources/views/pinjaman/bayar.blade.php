@extends('layouts.app')

@section('title', 'Bayar Pinjaman')

@section('content')
    <div class="container">
        <!-- Form untuk pembayaran pinjaman -->
        <form action="{{ route('pinjaman.bayar.store', $pinjaman->id) }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_transaksi">Kode Transaksi:</label>
                <input type="text" id="kode_transaksi" name="kode_transaksi" value="{{ $pinjaman->kode_transaksi }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="tanggal_transaksi">Tanggal Pembayaran:</label>
                <input type="date" id="tanggal_transaksi" name="tanggal_transaksi" value="{{ now()->format('Y-m-d') }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="nominal_angsuran">Nominal Angsuran:</label>
                <input type="number" id="nominal_angsuran" name="nominal_angsuran" value="{{ $total_angsuran }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu (bulan):</label>
                <input type="number" id="jangka_waktu" name="jangka_waktu" value="{{ $pinjaman->jangka_waktu }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total_utang_sebelum">Total Utang Sebelum Pembayaran:</label>
                <input type="number" id="total_utang_sebelum" name="total_utang_sebelum" value="{{ $pinjaman->total_utang }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="total_utang_sesudah">Total Utang Sesudah Pembayaran:</label>
                <input type="number" id="total_utang_sesudah" name="total_utang_sesudah" value="{{ $total_utang_sesudah }}" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <select name="status[]" id="status" class="form-control" multiple>
                    <option value="Request">Request</option>
                    <option value="Verifikasi">Verifikasi</option>
                    <option value="Late">Late</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Bayar Pinjaman</button>
        </form>
    </div>
@endsection
