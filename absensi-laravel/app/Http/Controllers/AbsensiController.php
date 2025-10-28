<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\SesiAbsensi;
use App\Models\Absensi;
use Carbon\Carbon;

class AbsensiController extends Controller
{
    // tampil form scan manual (jika browser)
    public function scanForm(Request $r){
        $code = $r->query('code');
        return view('absensi.scan', compact('code'));
    }

    public function storeByQr(Request $r){
        $r->validate(['qr_code'=>'required','nim'=>'required']);
        $sesi = SesiAbsensi::where('qr_code',$r->qr_code)->first();
        if(!$sesi) return back()->withErrors(['error'=>'Sesi tidak ditemukan']);
        if($sesi->status != 'aktif') return back()->withErrors(['error'=>'Sesi tidak aktif']);
        if($sesi->batas_waktu && Carbon::now()->gt(Carbon::parse($sesi->batas_waktu))) return back()->withErrors(['error'=>'Batas waktu lewat']);
        $exists = Absensi::where('id_sesi',$sesi->id_sesi)->where('nim_mahasiswa',$r->nim)->first();
        if($exists) return back()->with('message','Kamu sudah absen di sesi ini.');
        Absensi::create([
            'id_sesi'=>$sesi->id_sesi,
            'nim_mahasiswa'=>$r->nim,
            'waktu_absen'=>Carbon::now(),
            'status_kehadiran'=>'Hadir',
            'lokasi'=>$r->lokasi ?? null
        ]);
        return back()->with('message','Absensi berhasil');
    }
}
