<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_kurir')->create('tracking', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('pengiriman_id');
            $table->string('lokasi');
            $table->timestamp('waktu');
            $table->string('status');
            $table->foreign('pengiriman_id')->references('id')->on('db_kurir.pengiriman')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_kurir')->dropIfExists('tracking');
    }
};
