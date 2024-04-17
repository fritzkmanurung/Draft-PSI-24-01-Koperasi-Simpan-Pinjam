<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bukti Simpanan</title>
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

        <h1 class="card-title">Bukti Simpanan</h1>
        
        <div class="card">
            <div class="card-body">
                <p style="text-align: right; margin-bottom: 40px;">
                    <?php echo date('d F Y', strtotime($simpanan->tanggal_transaksi)); ?>
                </p>
                <div style="display: flex; align-self: center; margin-bottom: 20px;">
                    <p>Kode Simpanan <strong style="margin-right:10px; margin-left: 58px;">:</strong>{{ $simpanan->kode_transaksi }}</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Nama Anggota<strong style="margin-right:10px; margin-left: 75px;">:</strong> {{ $simpanan->user->name }}</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Nominal<strong style="margin-right:10px; margin-left: 140px;">:</strong> Rp {{ number_format($simpanan->nominal, 0, ',', '.') }},00</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -10px;">
                    <p>Tanggal Transaksi <strong style="margin-right:15px; margin-left: 34px;">:</strong>{{ \Carbon\Carbon::parse($simpanan->tanggal_transaksi)->isoFormat('DD MMMM YYYY') }}</p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: -15px;">
                    <p>Jenis Simpanan<strong style="margin-right:10px; margin-left: 64px;">:</strong>
                        @if($simpanan->jenis == 'sp')
                            Simpanan Pokok
                        @elseif($simpanan->jenis == 'sw')
                            Simpanan Wajib
                        @else
                            Simpanan Sukarela
                        @endif
                    </p>
                </div>
                <div style="display: flex; align-self: center; margin-bottom: 35px;">
                    <p>Status Simpanan <strong style="margin-right:10px; margin-left: 48px;">:</strong> {{ $simpanan->status }}</p>
                </div>

                <h4 style="text-align: right; margin-top: 100px;">Rp {{ number_format($simpanan->nominal, 0, ',', '.') }},00</h4>
                <h2 style="text-align: right; margin-top: -20px;">Tersimpan</h2>

                <h3 style="text-align: center; margin-top: 150px;">Terimakasih Telah Melakukan Simpanan</h3>
                <h3 style="text-align: center; margin-top: px;">Koperasi PI/DEL</h3>
            </div>
        </div>
</body>
</html>
