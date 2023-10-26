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
        Schema::create('session_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("course_id");
            $table->string('judul_sesi');
            $table->string('lama_sesi');
            $table->enum('informasi_lama_sesi', ['jam', 'menit']);
            $table->bigInteger('harga_sesi');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('kursuses')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('session_courses');
    }
};
