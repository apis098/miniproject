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
        Schema::create('jenis_kursuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_kursus');
            $table->string('jenis_kursus');
            $table->timestamps();

            $table->foreign('id_kursus')->references('id')->on('kursuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jenis_kursuses');
    }
};
