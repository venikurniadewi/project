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
            $table->foreignId('id_karyawan');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->string('jenis'); // Menyimpan jenis presensi (tepat_waktu, terlambat, izin)
            $table->string('alasan')->nullable(); // Alasan terlambat atau izin (opsional)
            $table->timestamps();

            // Definisi foreign key constraint
            $table->foreign('id_karyawan')->references('id')->on('karyawan')->onDelete('cascade');
            // Pastikan tabel 'karyawan' sudah ada sebelum menjalankan migrasi ini

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
