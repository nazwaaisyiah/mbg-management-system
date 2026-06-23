<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('mysql')->create('monitoring', function (Blueprint $table) {
            $table->id();
            $table->date('tanggal');
            $table->integer('jumlah_sekolah')->default(0);
            $table->integer('jumlah_pengiriman')->default(0);
            $table->integer('jumlah_menu')->default(0);
            $table->integer('jumlah_stok')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::connection('mysql')->dropIfExists('monitoring');
    }
};
