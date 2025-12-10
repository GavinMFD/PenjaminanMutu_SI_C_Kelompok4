<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
         $mataKuliah = 6;
        $hadir = 48;
        $persentaseKehadiran = 90;
        $tugasAktif = 3;

        $kehadiranPie = [
            'hadir' => 85,
            'izin' => 10,
            'alpha' => 5
        ];

        $kehadiranMatkul = [
            'Pemrograman Web' => 92,
            'Basis Data' => 88,
            'Analisis Sistem' => 95,
            'Interaksi Manusia Komputer' => 90,
            'Keamanan Informasi' => 85
        ];

        return view('mahasiswa.dashboard', compact(
            'mataKuliah', 'hadir', 'persentaseKehadiran', 'tugasAktif',
            'kehadiranPie', 'kehadiranMatkul'
        ));
    }
}
