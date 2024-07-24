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
        Schema::create('notifikasi_disposisis', function (Blueprint $table) {
            $table->id();
            $table->text('pesan');
            $table->string('link');
            $table->boolean('is_read')->default(false);
            $table->string('disposisi_token')->unique();;
            $table->foreign('disposisi_token')->references('token')->on('disposisis');
            $table->foreignId('disposisi_id')->constrained('disposisis')->cascadeOnDelete();
            $table->foreignId('surat_id')->constrained('masuks')->cascadeOnDelete();
            $table->foreignId('user_id')->constrained('users')->cascadeOnUpdate();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi_disposisis');
    }
};
