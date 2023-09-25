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
        Schema::create('paket_kursuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kursus_id');
            $table->integer('waktu');
            $table->bigInteger('harga');
            $table->timestamps();

            $table->foreign('kursus_id')->references('id')->on('kursuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('paket_kursuses');
    }
};
