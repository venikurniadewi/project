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
            $table->unsignedBigInteger('uniq_id'); // Menggunakan unsignedBigInteger untuk merujuk ke id karyawan
            $table->foreign('uniq_id')->references('id')->on('karyawans')->onDelete('cascade');
            $table->date('tanggal');
            $table->time('jam_masuk');
            $table->string('jenis'); // Menyimpan jenis presensi (tepat_waktu, terlambat, izin)
            $table->string('alasan')->nullable(); // Alasan terlambat atau izin (opsional)
            $table->timestamps();
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
