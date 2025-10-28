<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Hash;

class MahasiswaSeeder extends Seeder
{
    public function run(): void
    {
        Mahasiswa::create(['nim'=>'M001','nama'=>'Budi','email'=>'budi@test','password'=>Hash::make('password123'),'jurusan'=>'Teknik Informatika']);
    }
}
