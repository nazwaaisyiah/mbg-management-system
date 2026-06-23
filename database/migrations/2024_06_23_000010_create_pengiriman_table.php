<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_kurir')->create('pengiriman', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kurir_id');
            $table->unsignedBigInteger('sekolah_id');
            $table->date('tanggal');
            $table->integer('jumlah_porsi');
            $table->enum('status', ['pickup', 'perjalanan', 'diterima', 'ditolak'])->default('pickup');
            $table->foreign('kurir_id')->references('id')->on('db_kurir.kurir')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_kurir')->dropIfExists('pengiriman');
    }
};
