<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('sesi_absensi', function (Blueprint $table) {
            $table->id('id_sesi');
             $table->unsignedBigInteger('id_jadwal');
             $table->date('tanggal');
             $table->string('qr_code')->nullable();
             $table->time('batas_waktu')->nullable();
             $table->enum('status', ['aktif', 'tutup'])->default('aktif');

             $table->foreign('id_jadwal')->references('id_jadwal')->on('jadwal_kuliah')
                    ->onDelete('cascade');

             $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sesi_absensi');
    }
};
