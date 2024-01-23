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
        Schema::create('tvets', function (Blueprint $table) {
            $table->id();
            $table->string('nama_penuh');
            $table->string('no_kp');
            $table->string('alamat');
            $table->string('no_tel');
            $table->string('no_tel_ibubapa');
            $table->string('emel');
            $table->string('kursus_id')->constrained('kursus_ditawarkan')->cascadeOnDelete();
            $table->string('akuan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tvets');
    }
};
