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
        Schema::create('keluar_masuks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('ndp_id');
            $table->unsignedBigInteger('tujuan_id');
            $table->string('pegawaikeluar_id')->nullable();
            $table->string('tarikh_keluar')->nullable();
            $table->string('masa_keluar')->nullable();
            $table->string('pegawaimasuk_id')->nullable();
            $table->string('tarikh_masuk')->nullable();
            $table->string('masa_masuk')->nullable();
            $table->string('status_masuk')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluar_masuks');
    }
};
