<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Nette\Utils\Strings;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('larangan_models', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id');
            $table->date('tarikh_mula');
            $table->date('tarikh_akhir');
            $table->String('catatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('larangan_models');
    }
};
