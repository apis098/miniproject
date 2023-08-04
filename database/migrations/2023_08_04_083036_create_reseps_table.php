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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('userkoki_id')->nullable();
            $table->unsignedBigInteger('tipsdasar_id')->nullable();
            $table->unsignedBigInteger('seputardapur_id')->nullable();
            $table->unsignedBigInteger('specialday_id')->nullable();
            $table->string('nama_masakan');
            $table->string('foto_masakan');
            $table->text('deskripsi_masakan');
            $table->string('bahan_masakan');
            $table->longText('langkah2_memasak');
            $table->timestamps();

            $table->foreign('userkoki_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('tipsdasar_id')->references('id')->on('kategori_tipsdasars')->onDelete('cascade');
            $table->foreign('seputardapur_id')->references('id')->on('kategori_seputardapurs')->onDelete('cascade');
            $table->foreign('specialday_id')->references('id')->on('special_days')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reseps');
    }
};
