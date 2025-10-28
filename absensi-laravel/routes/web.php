<?php
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DosenController;
use App\Http\Controllers\AbsensiController;
use App\Http\Controllers\MahasiswaController;

/* Auth */
Route::get('/login',[AuthController::class,'showLogin'])->name('login');
Route::post('/login',[AuthController::class,'login'])->name('login.post');
Route::post('/logout',[AuthController::class,'logout'])->name('logout');

/* Mahasiswa */
Route::get('/mahasiswa/dashboard',[MahasiswaController::class,'dashboard'])->name('mahasiswa.dashboard');

/* Dosen */
Route::get('/dosen/dashboard',[DosenController::class,'dashboard'])->name('dosen.dashboard');
Route::get('/dosen/jadwal/{id}/create-sesi',[DosenController::class,'createSesiForm'])->name('dosen.sesi.create');
Route::post('/dosen/sesi',[DosenController::class,'storeSesi'])->name('dosen.sesi.store');
Route::get('/dosen/sesi/{id}',[DosenController::class,'showSesi'])->name('dosen.sesi.show');

/* Absensi (scan QR) */
Route::get('/absensi/scan',[AbsensiController::class,'scanForm'])->name('absensi.scan.form');
Route::post('/absensi/scan',[AbsensiController::class,'storeByQr'])->name('absensi.scan.store');
