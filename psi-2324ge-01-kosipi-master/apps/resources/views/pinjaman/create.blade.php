@extends('layouts.app')

@section('title', 'Tambah Pinjaman')

@section('content')
    <div class="container">
        <h1>Tambah Pinjaman</h1>
        <!-- Formulir untuk menambahkan pinjaman -->
        <form action="{{ route('pinjaman.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="tanggal">Tanggal Transaksi</label>
                <input type="date" name="tanggal" id="tanggal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nama">Nama Anggota</label>
                <select name="nama" id="nama" class="form-control" required>
                    @foreach($anggota as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="nominal">Nominal Pinjaman</label>
                <input type="number" name="nominal" id="nominal" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="bunga">Bunga (%)</label>
                <input type="number" name="bunga" id="bunga" class="form-control" value="3" readonly>
            </div>
            <div class="form-group">
                <label for="jangka_waktu">Jangka Waktu (bulan)</label>
                <input type="number" name="jangka_waktu" id="jangka_waktu" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nominal_angsuran">Nominal Angsuran</label>
                <input type="number" name="nominal_angsuran" id="nominal_angsuran" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="harga_barang_jaminan">Harga Barang Jaminan</label>
                <input type="number" name="harga_barang_jaminan" id="harga_barang_jaminan" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="total_utang">Total Utang</label>
                <input type="number" name="total_utang" id="total_utang" class="form-control" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
        </form>
    </div>

    <script>
        // Menghitung total utang dan nominal angsuran saat nilai input berubah
        function hitungTotalUtang() {
            var nominalPinjaman = parseFloat(document.getElementById('nominal').value);
            var bunga = parseFloat(document.getElementById('bunga').value);
            var jangkaWaktu = parseFloat(document.getElementById('jangka_waktu').value);
            var hargaBarangJaminan = parseFloat(document.getElementById('harga_barang_jaminan').value);

            var totalBunga = (nominalPinjaman * (bunga / 100));
            var totalUtang = nominalPinjaman + totalBunga;
            var nominalAngsuran = nominalPinjaman / jangkaWaktu;

            document.getElementById('total_utang').value = totalUtang.toFixed(2);
            document.getElementById('nominal_angsuran').value = nominalAngsuran.toFixed(2);
        }

        // Memanggil fungsi hitungTotalUtang saat nilai input berubah
        document.getElementById('nominal').addEventListener('change', hitungTotalUtang);
        document.getElementById('bunga').addEventListener('change', hitungTotalUtang);
        document.getElementById('jangka_waktu').addEventListener('change', hitungTotalUtang);
        document.getElementById('harga_barang_jaminan').addEventListener('change', hitungTotalUtang);

        // Memanggil fungsi hitungTotalUtang saat halaman dimuat
        window.addEventListener('load', hitungTotalUtang);
    </script>
@endsection
