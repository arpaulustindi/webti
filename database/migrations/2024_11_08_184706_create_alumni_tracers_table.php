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
        Schema::create('alumni_tracers', function (Blueprint $table) {
            $table->id();
            $table->string('nama');
            $table->integer('tahun_masuk');
            $table->integer('tahun_lulus');
            $table->string('nim');
            $table->string('waktu_tunggu');
            $table->string('kantor');
            $table->string('lingkup');
            $table->string('bidang');
            $table->string('penetrasi');
            $table->string('hp');
            $table->string('domisili');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_tracers');
    }
};
