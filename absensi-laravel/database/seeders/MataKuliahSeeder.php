<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\MataKuliah;

class MataKuliahSeeder extends Seeder
{
    public function run(): void
    {
        MataKuliah::create(['kode_mk'=>'MK001','nama_mk'=>'Pemrograman Web','sks'=>3,'nip_dosen'=>'D001']);
    }
}
