<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Pembayaran</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #ffffff;
            padding: 20px;
        }
        .container {
            max-width: 500px;
            margin: auto;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        .card {
            margin-bottom: 20px;
            padding: 10px;
        }
        .card-title {
            margin-bottom: 20px;
            font-size: 35px;
            text-align: center;
        }
        .card-body p {
            margin-bottom: 10px;
            font-size: 22px;
        }
        h4 {
            font-size: 30px;
            color: #207a2c
        }
        h2 {
            font-size: 30px;
            color: #207a2c
        }
        h3 {
            font-size: 30px;
        }
    </style>
</head>
<body>

        <h1 class="card-title">Bukti Pembayaran</h1>
        
        <div class="card">
            <div class="card-body">
                <p style="text-align: right; margin-bottom: 40px;">
                    <?php echo date('d F Y', strtotime($pembayaran->tanggal_transaksi)); ?>
                </p>
                <div style="display: flex; align-self: center; margin-bottom: 20px;">
                    <p>Kode Pembayaran <strong style="margin-right:10px; margin-left: 58px;">:</strong>{{ $pembayaran->kode_pembayaran }}</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Nama <strong style="margin-right:10px; margin-left: 181px;">:</strong> {{ $pembayaran->pinjaman->user->name }}</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Nominal Angsuran <strong style="margin-right:10px; margin-left: 60px;">:</strong> Rp {{ number_format($pembayaran->nominal_angsuran, 0, ',', '.') }},00</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Total Utang Sebelum <strong style="margin-right:10px; margin-left: 34px;">:</strong> Rp {{ number_format($pembayaran->total_utang_sebelum, 0, ',', '.') }},00</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Total Utang Sesudah <strong style="margin-right:10px; margin-left: 34px;">:</strong> Rp {{ number_format($pembayaran->total_utang_sesudah, 0, ',', '.') }},00</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: 35px;">
                    <p>Status Pembayaran <strong style="margin-right:10px; margin-left: 48px;">:</strong> {{ $pembayaran->status }}</p>
                </div>

                <h4 style="text-align: right; margin-top: 100px;">Rp {{ number_format($pembayaran->nominal_angsuran, 0, ',', '.') }},00</h4>
                <h2 style="text-align: right; margin-top: -20px;">Dibayar</h2>

                <h3 style="text-align: center; margin-top: 150px;">Terimakasih Telah Menjadi Anggota</h3>
                <h3 style="text-align: center; margin-top: px;">Koperasi PI/DEL</h3>
            </div>
        </div>
</body>
</html>
