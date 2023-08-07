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
        Schema::create('basic_tips', function (Blueprint $table) {
            $table->id();
            $table->foreignId('kategori_id')->references('id')->on('kategori_tipsdasars')->cascadeOnDelete();
            $table->foreignId('userkoki_id')->references('id')->on('users')->cascadeOnDelete()->nullable();
            $table->string('judul');
            $table->string('foto');
            $table->longText('deskripsi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
