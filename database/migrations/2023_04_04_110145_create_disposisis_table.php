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
        Schema::create('disposisis', function (Blueprint $table) {
            $table->id();
            $table->string('penerima');
            $table->date('tenggat_waktu')->nullable();
            $table->text('isi_disposisi');
            // $table->text('content')->nullable();
            $table->text('catatan')->nullable();
            $table->enum('status', ['Belum Dibaca', 'Sudah Dibaca'])->default('Belum Dibaca');
            $table->text('balasan')->nullable();
            $table->foreignId('surat_id')->constrained('masuks')->cascadeOnDelete();
            $table->string('token')->unique();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('disposisis');
    }
};
