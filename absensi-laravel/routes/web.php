<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;
use App\Http\Controllers\DosenController;

Route::get('/', function () {
    return redirect('/mahasiswa');
});

Route::resource('mahasiswa', MahasiswaController::class);
Route::resource('dosen', DosenController::class);
