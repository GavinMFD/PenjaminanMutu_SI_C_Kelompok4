<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('kelas', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->id('id_kelas');
            $table->string('nama_kelas', 100);
            // foreign key harus sama tipe dan panjangnya
            $table->string('kode_mk', 20);
             $table->foreign('kode_mk')
             ->references('kode_mk')
             ->on('mata_kuliah')
             ->onDelete('cascade');
             $table->timestamps();
});
;
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas');
    }
};
