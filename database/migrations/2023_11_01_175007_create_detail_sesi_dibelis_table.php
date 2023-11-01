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
        Schema::create('detail_sesi_dibeli', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('transaksi_kursus_id');
            $table->unsignedBigInteger('sesi_kursus_id');
            $table->timestamps();
            $table->foreign('transaksi_kursus_id')->references('id')->on('transaksi_kursuses')->onDelete('cascade');
            $table->foreign('sesi_kursus_id')->references('id')->on('session_courses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_sesi_dibelis');
    }
};
