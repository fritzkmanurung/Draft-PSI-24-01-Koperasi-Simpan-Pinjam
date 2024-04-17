# PSI-2021ge-01 KOSIPI (Koperasi Simpan Pinjam)
Please read [RULES.md](RULES.md).

## General Description
Website Koperasi Simpan Pinjam adalah sebuah platform online yang memfasilitasi kegiatan koperasi simpan pinjam secara efisien dan mudah diakses oleh anggota koperasi. Website ini akan menjadi pusat informasi dan layanan bagi anggota koperasi untuk melakukan transaksi simpan pinjam. Platform ini juga akan menjadi tempat untuk mendapatkan informasi tentang pertemuan yang akan dilakukan, besaran pinjaman yang dilakukan, besaran simpanan yang sudah dilakukan, dan hal-hal lainnya yang akan memungkinkan anggota dan pengurus koperasi berkomunikasi satu sama lain.

Pihak-pihak yang nantinya akan membutuhkan dan mengoperasikan website ini adalah sebagai berikut.
1. Owner (Pemilik Sistem)    : Pengurus Koperasi
2. User (Pengguna Langsung)  : Anggota Koperasi
3. Supervisor                : Pengawas proyek pengembangan sistem informasi dan memastikan bahwa proyek berjalan sesuai dengan rencana


## Features

Pada website ini, tersedia beberapa fitur yang akan membantu kegiatan koperasi simpan pinjam. Berikut adalah fitur-fitur yang tersedia pada website KOSIPI.

1. Fitur Pengelolaan Simpanan Anggota
Fitur ini akan mencatat:
- Simpanan Pokok
- Simpanan Wajib
- Simpanan Sukarela
- Simpanan Lainnya yang dibutuhkan koperasi

Kemudahan yang didapat pada fitur ini adalah sebagai berikut:
a. Informasi data simpanan tiap anggota
b. Pengelolaan jenis simpanan
c. Informasi mutasi simpanan
d. Cetak tabungan dan mutasi
e. Informasi tagihan dan tunggakan simpanan wajib
f. Pengelolaan permohonan penarikan simpanan

2. Fitur Pengelolaan Pinjaman Anggota
Pengelolaan pinjaman anggota koperasi dapat dilakukan dengan mudah dan cepat. Selain itu, fitur ini juga menjurnal otomatis transaksi yang terinput sehingga pengelolaan pinjaman koperasi lebih efektif dan efisien. 

Kemudahan lain yang didapat pada fitur ini adalah sebagai berikut:
a. Informasi pinjaman tiap anggota
b. Pengelolaan jenis pinjaman
c. Informasi mutasi pinjaman
d. Cetak kartu angsuran dan mutasi
e. Informasi tagihan pinjaman dan tanggal jatuh tempo
f. Pengelolaan permohonan pinjaman baru
g. Konfigurasi limit pinjaman

3. Fitur Login
Aplikasi ini hanya bisa dibuka oleh :
- Admin
Petugas yang akan menginput data anggota baru dan peminjam baru
Fitur yang bisa diakses : Lihat, tambah dan hapus data anggota

- Bendahara
Petugas yang akan menginput transaksi keuangan yang terdiri dari penerimaan kas dan pengeluaran kas
Fitur yang bisa diakses : Lihat, tambah dan hapus data transaksi

- Pengurus dan Pengawas Koperasi
Pejabat koperasi yang berwenang dan bertanggungjawab seluruh aktifitas koperasi.
Fitur yang bisa diakses : Lihat data anggota dan data transaksi

- Anggota
Anggota hanya dapat melihat informasi yang tersedia pada website
Fitur yang bisa diakses: Lihat data diri, pinjaman, simpanan, dan pengumuman

Masing-masing petugas memiliki password sendiri dan hanya yang bersangkutan yang bisa mengedit passwordnya.

Pada fitur ini pengurus koperasi dapat mengetahui informasi sesuai wewenangnya sebagai berikut:
a. Informasi simpanan dan pinjaman
b. Permohonan penarikan simpanan
c. Informasi tagihan simpanan wajib, angsuran, dan jatuh tempo pembayaran
d. Pembayaran simpanan dan pinjaman
e. History / rekap mutasi transaksi
f. Pengiriman bukti transfer
g. Informasi sisa hasil usaha (SHU Koperasi dan Estimasi SHU Anggota)

4. Fitur Data Master
Pada fitur ini aplikasi dapat mencatat dan mengarsipkan database secara maksimal.
a. Pengelolaan Profil Koperasi
b. Pengelolaan Data Anggota
c. Pengelolaan Data Pengurus
d. Pengelolaan Data Karyawan
e. Pengelolaan Data Aset Barang

## Architectural Design

## Database Design

## Installation Guide

Langkah-Langkah untuk Clone :
1. Lakukan cloning di dalam folder yang diinginkan.
2. Buka folder pada Visual Studio Code.
3. Lakukan Perintah :
   cd apps
   cp .env.example .env //Untuk menyalin .env.example dan membuatnya menjadi .env
4. Sesuaikan nama database dengan database yang diinginkan.
5. Lakukan Perintah :
   php artisan key:generate //Untuk membuat Kunci
   php artisan storage:link //Untuk membuat Tautan Penyimpanan
   php artisan migrate --seed //Untuk membuat tabel dan memasukkan data

Akun admin:
Username : admin
Password : password

Akun bendahara:
Username : bendahara
Password : password

Akun anggota:
Username : anggota
Password : password

### Minimum Hardware Requirements

### Minimum Software Requirements


# Contributors
+ 12S21001 - Dhino Rayvaldo Turnip (@GitHubUsername)
+ 12S21002 - Marudut Budiman Tampubolon (@MarudutTmp)
+ 12S21014 - Fritz Kevin Manurung (@fritzkmanurung)
+ 12S21034 - Lasni Sinta Uli Simanjuntak (@Lasnisimanjuntak)
+ 12S21052 - Griselda (@Griselda20)
