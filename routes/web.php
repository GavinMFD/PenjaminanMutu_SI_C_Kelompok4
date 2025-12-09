<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\DashboardController as AdminDashboardController;
use App\Http\Controllers\Admin\AbsensiController as AdminAbsensiController;
use App\Http\Controllers\Dosen\DashboardController as DosenDashboardController;
use App\Http\Controllers\Mahasiswa\DashboardController as MahasiswaDashboardController;
use App\Http\Controllers\Mahasiswa\AbsensiController as MahasiswaAbsensiController;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/absensi', [AdminAbsensiController::class, 'index'])->name('admin.absensi.index');
});

Route::middleware(['auth', 'role:dosen'])->prefix('dosen')->group(function () {
    Route::get('/dashboard', [DosenDashboardController::class, 'index'])->name('dosen.dashboard');
});

Route::middleware(['auth', 'role:mahasiswa'])->prefix('mahasiswa')->group(function () {
    Route::get('/dashboard', [MahasiswaDashboardController::class, 'index'])->name('mahasiswa.dashboard');
    Route::get('/scan', [MahasiswaAbsensiController::class, 'scan'])->name('mahasiswa.scan');
    Route::get('/scan/process', [MahasiswaAbsensiController::class, 'scanProcess'])->name('mahasiswa.scan.process');
});
