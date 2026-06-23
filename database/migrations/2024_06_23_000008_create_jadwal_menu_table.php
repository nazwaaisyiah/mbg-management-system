<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_dapur')->create('jadwal_menu', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('menu_id');
            $table->date('tanggal_saji');
            $table->foreign('menu_id')->references('id')->on('db_dapur.menu')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_dapur')->dropIfExists('jadwal_menu');
    }
};
