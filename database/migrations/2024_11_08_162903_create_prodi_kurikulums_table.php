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
        Schema::create('prodi_kurikulums', function (Blueprint $table) {
            $table->id();
            $table->integer('semester');
            $table->string('jenis');
            $table->string('rumpun');
            $table->string('kode');
            $table->string('mata_kuliah');
            $table->integer('teori');
            $table->integer('praktek');
            $table->string('rps');
            $table->string('modul');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prodi_kurikulums');
    }
};
