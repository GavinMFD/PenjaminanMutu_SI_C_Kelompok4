<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Jadwal;

class JadwalSeeder extends Seeder
{
    public function run(): void
    {
        Jadwal::create(['kode_mk'=>'MK001','hari'=>'Senin','jam_mulai'=>'09:00:00','jam_selesai'=>'11:00:00']);
    }
}
