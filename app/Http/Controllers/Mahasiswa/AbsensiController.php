<?php

namespace App\Http\Controllers\Mahasiswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Jadwal;
use Illuminate\Support\Facades\Auth;

class AbsensiController extends Controller
{
    public function scan()
    {
    return view('mahasiswa.scan');
    }

    public function scanProcess(Request $request)
    {
        if (!$request->has('code')) {
            return redirect()->route('mahasiswa.scan')
                ->with('error', 'QR Code tidak valid.');
        }

        $qr = $request->code;

        $jadwal = Jadwal::find($qr);

        if (!$jadwal) {
            return redirect()->route('mahasiswa.scan')
                ->with('error', 'QR Code tidak dikenali.');
        }

        $cek = Absensi::where('mahasiswa_id', Auth::id())
                ->where('jadwal_id', $jadwal->id)
                ->whereDate('created_at', now()->toDateString())
                ->first();

        if ($cek) {
            return redirect()->route('mahasiswa.scan')
                ->with('warning', 'Anda sudah melakukan absensi sebelumnya.');
        }

        Absensi::create([
            'mahasiswa_id' => Auth::id(),
            'jadwal_id'    => $jadwal->id,
            'status'       => 'Hadir',
            'waktu_absen'  => now(),
        ]);

        return redirect()->route('mahasiswa.dashboard')
            ->with('success', 'Absensi berhasil dicatat!');
    }
}
