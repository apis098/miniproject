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
        Schema::create('detail_session_courses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('session_course_id');
            $table->text('detail_sesi');
            $table->integer('lama_sesi');
            $table->enum('informasi_lama_sesi', ['jam', 'menit']);
            $table->timestamps();

            $table->foreign('session_course_id')->references('id')->on('session_courses')->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_session_courses');
    }
};
