<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePegawaisTable extends Migration
{
    public function up()
    {
        Schema::create('pegawais', function (Blueprint $table) {
            $table->id();
            $table->string('no'); // Kolom no
            $table->string('kode')->unique()->default(''); // Kolom kode dengan nilai default
            $table->string('nama');
            $table->string('jabatan');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pegawais');
    }
}
