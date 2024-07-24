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
        Schema::create('keluars', function (Blueprint $table) {
            $table->id();
            $table->string('nomor_surat')->unique()->comment('Nomor Surat');
            $table->date('tanggal_surat')->nullable();
            $table->string('nomor_agenda');
            $table->text('isi_ringkasan')->nullable();
            $table->string('tujuan')->nullable();
            $table->text('keterangan')->nullable();
            $table->string('lampiran')->nullable();
            $table->string('kode_klasifikasi');
            $table->foreign('kode_klasifikasi')->references('kode')->on('klasifikasi_surats');
            $table->string('sifat_surat');
            $table->foreign('sifat_surat')->references('sifat')->on('sifat_surats');
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('keluars');
    }
};
