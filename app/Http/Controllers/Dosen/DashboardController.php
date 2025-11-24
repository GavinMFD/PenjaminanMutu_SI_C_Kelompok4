<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
         $kelas = 4;
        $mahasiswa = 120;
        $rataKehadiran = 88;
        $grafikKehadiran = [
            'Senin' => 90,
            'Selasa' => 85,
            'Rabu' => 92,
            'Kamis' => 87,
            'Jumat' => 89
        ];

        return view('dosen.dashboard', compact('kelas', 'mahasiswa', 'rataKehadiran', 'grafikKehadiran'));
    }
}
