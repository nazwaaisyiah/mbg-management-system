<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_sekolah')->create('pesanan_harian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sekolah_id');
            $table->date('tanggal');
            $table->integer('jumlah_porsi');
            $table->enum('status', ['pending', 'disetujui', 'ditolak', 'dikirim'])->default('pending');
            $table->foreign('sekolah_id')->references('id')->on('db_sekolah.sekolah')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_sekolah')->dropIfExists('pesanan_harian');
    }
};
