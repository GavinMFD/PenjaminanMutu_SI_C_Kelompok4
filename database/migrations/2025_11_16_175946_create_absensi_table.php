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
        Schema::create('absensi', function (Blueprint $table) {
            $table->id('id_absensi');

            $table->unsignedBigInteger('id_sesi');
            $table->string('nim_mahasiswa');

            $table->timestamp('waktu_absen')->nullable();
            $table->enum('status_kehadiran', ['hadir', 'terlambat', 'izin', 'alpha'])
              ->default('alpha');

            $table->foreign('id_sesi')->references('id_sesi')->on('sesi_absensi')
                  ->onDelete('cascade');

            $table->foreign('nim_mahasiswa')->references('nim')->on('mahasiswa')
                  ->onDelete('cascade');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('absensi');
    }
};
