<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::connection('db_sekolah')->create('kritik_saran', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sekolah_id');
            $table->text('pesan');
            $table->date('tanggal');
            $table->foreign('sekolah_id')->references('id')->on('db_sekolah.sekolah')->onDelete('cascade');
        });
    }

    public function down(): void
    {
        Schema::connection('db_sekolah')->dropIfExists('kritik_saran');
    }
};
