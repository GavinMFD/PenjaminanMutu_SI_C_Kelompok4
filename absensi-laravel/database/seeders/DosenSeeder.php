<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\Models\Dosen;
use Illuminate\Support\Facades\Hash;

class DosenSeeder extends Seeder
{
    public function run(): void
    {
        Dosen::create(['nip'=>'D001','nama_dosen'=>'Dr. Fajar','email'=>'dosen1@test','password'=>Hash::make('password123')]);
    }
}
