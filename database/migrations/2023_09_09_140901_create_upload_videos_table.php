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
        Schema::create('upload_videos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->string("judul_video");
            $table->string("deskripsi_video");
            $table->string("upload_video");

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_videos');
    }
};
