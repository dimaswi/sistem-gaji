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
        Schema::create('penghasilan', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_induk_pegawai');
            $table->string('gaji_pokok');
            $table->string('tunjangan_sia');
            $table->string('tunjangan_transportasi');
            $table->string('tunjangan_jabatan');
            $table->string('uang_jaga_utama');
            $table->string('uang_jaga_pratama');
            $table->string('jaspel_pratama');
            $table->string('jaspel_ranap');
            $table->string('jaspel_irja');
            $table->string('tugas_tambahan');
            $table->string('jumlah');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penghasilan');
    }
};
