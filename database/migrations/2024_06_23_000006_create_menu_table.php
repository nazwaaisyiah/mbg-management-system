<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_dapur')->create('menu', function (Blueprint $table) {
            $table->id();
            $table->string('nama_menu');
            $table->integer('kalori')->nullable();
            $table->decimal('protein', 8, 2)->nullable();
            $table->decimal('karbohidrat', 8, 2)->nullable();
            $table->decimal('lemak', 8, 2)->nullable();
        });
    }

    public function down(): void
    {
        Schema::connection('db_dapur')->dropIfExists('menu');
    }
};
