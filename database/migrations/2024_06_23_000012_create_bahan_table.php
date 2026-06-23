<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_gudang')->create('bahan', function (Blueprint $table) {
            $table->id();
            $table->string('nama_bahan');
            $table->integer('stok')->default(0);
            $table->string('satuan');
            $table->integer('minimum_stok')->default(0);
        });
    }

    public function down(): void
    {
        Schema::connection('db_gudang')->dropIfExists('bahan');
    }
};
