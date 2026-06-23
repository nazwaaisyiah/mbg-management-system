<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_kurir')->create('kurir', function (Blueprint $table) {
            $table->id();
            $table->string('nama_kurir');
            $table->string('telepon');
            $table->string('kendaraan');
        });
    }

    public function down(): void
    {
        Schema::connection('db_kurir')->dropIfExists('kurir');
    }
};
