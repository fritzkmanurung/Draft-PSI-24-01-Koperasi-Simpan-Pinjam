<?php

use Illuminate\Support\Facades\Route;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\Auth\LoginController;

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

use App\Http\Controllers\DashboardController;

Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

use App\Http\Controllers\EventController;

Route::get('/events', [EventController::class, 'index'])->name('events.index');
Route::get('/events/create', [EventController::class, 'create'])->name('events.create');
Route::post('/events', [EventController::class, 'store'])->name('events.store');

use App\Http\Controllers\AnggotaController;

Route::get('/anggota', [AnggotaController::class, 'index'])->name('anggota.index');
Route::get('/anggota/create', [AnggotaController::class, 'create'])->name('anggota.create');
Route::post('/anggota/store', [AnggotaController::class, 'store'])->name('anggota.store');
Route::get('/anggota/{id}/edit', [AnggotaController::class, 'edit'])->name('anggota.edit');
Route::put('/anggota/{id}/update', [AnggotaController::class, 'update'])->name('anggota.update');
Route::delete('/anggota/{id}/destroy', [AnggotaController::class, 'destroy'])->name('anggota.destroy');

use App\Http\Controllers\SimpananController;

Route::get('/simpanan', [SimpananController::class, 'index'])->name('simpanan.index');
Route::get('/simpanan/create', [SimpananController::class, 'create'])->name('simpanan.create');
Route::post('/simpanan/store', [SimpananController::class, 'store'])->name('simpanan.store');
Route::get('/simpanan/{simpanan}/edit', [SimpananController::class, 'edit'])->name('simpanan.edit');
Route::get('/simpanan/{simpanan}/bukti', [SimpananController::class, 'bukti'])->name('simpanan.bukti');
Route::get('/simpanan/{simpanan}/download', [SimpananController::class, 'download'])->name('simpanan.download');
Route::put('/simpanan/{simpanan}', [SimpananController::class, 'update'])->name('simpanan.update');

use App\Http\Controllers\PinjamanController;

Route::get('/pinjaman', [PinjamanController::class, 'index'])->name('pinjaman.index');
Route::get('/pinjaman/create', [PinjamanController::class, 'create'])->name('pinjaman.create');
Route::post('/pinjaman', [PinjamanController::class, 'store'])->name('pinjaman.store');


use App\Http\Controllers\PembayaranController;

Route::get('/pinjaman/{pinjaman}/bayar', [PembayaranController::class, 'bayar'])->name('pinjaman.bayar');
Route::post('/pinjaman/{pinjaman}/bayar', [PembayaranController::class, 'store'])->name('pinjaman.bayar.store');
Route::get('/pinjaman/{pinjaman}/riwayat', [PembayaranController::class, 'riwayat'])->name('pinjaman.riwayat');
Route::get('pembayaran/{pembayaran}/edit', [PembayaranController::class, 'edit'])->name('pembayaran.edit');
Route::put('pembayaran/{pembayaran}', [PembayaranController::class, 'update'])->name('pembayaran.update');
// Route::get('/pembayaran/{pembayaran}/bukti', [PembayaranController::class, 'bukti'])->name('pembayaran.bukti');
Route::get('/pembayaran/{pembayaran}/download', [PembayaranController::class, 'download'])->name('pembayaran.download');

use App\Http\Controllers\SettingsController;

Route::get('/settings', [SettingsController::class, 'index'])->name('settings');
Route::put('/settings/update-password', [SettingsController::class, 'updatePassword'])->name('update.password');

use App\Http\Controllers\ProfileController;

Route::get('/profile', [ProfileController::class, 'index'])->name('profile.index');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update');

use App\Http\Controllers\AboutController;

Route::get('/about', [AboutController::class, 'index'])->name('about.index');
