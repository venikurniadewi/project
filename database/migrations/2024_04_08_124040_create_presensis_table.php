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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
<<<<<<< HEAD
            $table->unsignedBigInteger('uniq_id'); // Menggunakan unsignedBigInteger untuk merujuk ke id karyawan
            $table->foreign('uniq_id')->references('id')->on('karyawans')->onDelete('cascade');
=======
            $table->foreignId('id_karyawan');
>>>>>>> ef307086c28b3681248d071ecfaa740ded6e1126
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->string('jenis'); // Menyimpan jenis presensi (tepat_waktu, terlambat, izin)
            $table->string('alasan')->nullable(); // Alasan terlambat atau izin (opsional)
            $table->timestamps();
<<<<<<< HEAD
=======

            // Definisi foreign key constraint
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            // Pastikan tabel 'karyawan' sudah ada sebelum menjalankan migrasi ini

>>>>>>> ef307086c28b3681248d071ecfaa740ded6e1126
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
