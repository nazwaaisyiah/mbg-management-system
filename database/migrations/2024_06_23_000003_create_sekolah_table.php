<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_sekolah')->create('sekolah', function (Blueprint $table) {
            $table->id();
            $table->string('nama_sekolah');
            $table->text('alamat');
            $table->string('kepala_sekolah');
            $table->integer('jumlah_siswa');
        });
    }

    public function down(): void
    {
        Schema::connection('db_sekolah')->dropIfExists('sekolah');
    }
};
