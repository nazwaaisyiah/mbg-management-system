<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_gudang')->create('pembelian', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bahan_id');
            $table->date('tanggal');
            $table->integer('jumlah');
            $table->string('supplier');
            $table->foreign('bahan_id')->references('id')->on('db_gudang.bahan')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_gudang')->dropIfExists('pembelian');
    }
};
