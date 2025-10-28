<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('mata_kuliah', function (Blueprint $table) {
            $table->engine = 'InnoDB';

            $table->string('kode_mk', 20)->primary();
            $table->string('nama_mk', 100);
            $table->integer('sks')->nullable();

            // relasi ke dosen
            $table->string('nip_dosen', 20)->nullable();
            $table->foreign('nip_dosen')
                  ->references('nip')
                  ->on('dosen')
                  ->onDelete('set null');

            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('mata_kuliah');
    }
};
