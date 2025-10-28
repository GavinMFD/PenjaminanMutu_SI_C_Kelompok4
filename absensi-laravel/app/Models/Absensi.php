<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Absensi extends Model
{
    protected $table = 'absensi';
    protected $primaryKey = 'id_absensi';
    protected $fillable = ['id_sesi','nim_mahasiswa','waktu_absen','status_kehadiran','lokasi'];

    public function sesi(){ return $this->belongsTo(SesiAbsensi::class,'id_sesi','id_sesi'); }
    public function mahasiswa(){ return $this->belongsTo(Mahasiswa::class,'nim_mahasiswa','nim'); }
}
