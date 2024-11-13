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
        Schema::create('alumni_pengguna_lulusans', function (Blueprint $table) {
            $table->id();
            $table->string('email');
            $table->string('tipe_lembaga');
            $table->string('nama_lembaga');
            $table->string('pimpinan_lembaga');
            $table->string('kontak');
            $table->string('nama_alumni');
            $table->string('tahun_bekerja');
            $table->string('n_kerjasama_tim');
            $table->string('n_keahlian_ti');
            $table->string('n_bahasa_asing');
            $table->string('n_komunikasi');
            $table->string('n_pengembangan_diri');
            $table->string('n_kepemimpinan');
            $table->string('n_etos_kerja');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('alumni_pengguna_lulusans');
    }
};
