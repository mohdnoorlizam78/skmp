<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('pelajars', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_pelajar');
            $table->unsignedBigInteger('kursus_id');
            $table->string('no_ndp')->unique();
            $table->string('sesimasuk_id')->nullable();
            $table->string('gambar')->nullable();
            $table->string('alamat_rumah')->nullable();
            $table->string('alamat_lain')->nullable();
            $table->string('no_tel')->nullable();
            $table->string('no_tel_penjaga')->nullable();
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelajars');
    }
};
