<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_gudang')->create('permintaan_bahan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahan_id');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->enum('status', ['pending', 'disetujui', 'ditolak'])->default('pending');
            $table->foreign('bahan_id')->references('id')->on('db_gudang.bahan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_gudang')->dropIfExists('permintaan_bahan');
    }
};
