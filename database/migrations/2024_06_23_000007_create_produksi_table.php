<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_dapur')->create('produksi', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->date('tanggal');
            $table->integer('jumlah_porsi');
            $table->enum('status', ['perencanaan', 'produksi', 'selesai'])->default('perencanaan');
            $table->foreign('menu_id')->references('id')->on('db_dapur.menu')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_dapur')->dropIfExists('produksi');
    }
};
