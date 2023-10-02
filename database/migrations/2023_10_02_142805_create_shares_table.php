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
        Schema::create('shares', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained();
            $table->unsignedBigInteger('sender_id');
            $table->unsignedBigInteger('feed_id')->nullable();
            $table->unsignedBigInteger('resep_id')->nullable();
            $table->unsignedBigInteger('keluhan_id')->nullable();
            $table->timestamps();

            $table->foreign('sender_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('feed_id')->references('id')->on('upload_videos')->onDelete('cascade');
            $table->foreign('resep_id')->references('id')->on('reseps')->onDelete('cascade');
            $table->foreign('keluhan_id')->references('id')->on('complaints')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('shares');
    }
};
