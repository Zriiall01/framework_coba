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
        Schema::create('mahasiswa', function (Blueprint $table) {
            $table->increments('mahasiswa_id');
            $table->string('nama_mhs');
            $table->string('nim_mhs');
            $table->unsignedInteger('jurusan_id'); // Kolom untuk foreign key

            // Definisi foreign key
            $table->foreign('jurusan_id')->references('jurusan_id')->on('jurusan');
            $table->string('foto');
            $table->text('deskripsi');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mahasiswa');
    }
};
