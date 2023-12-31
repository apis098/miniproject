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
        Schema::create('comment_veeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pengirim_id");
            $table->unsignedBigInteger("penerima_id");
            $table->unsignedBigInteger("veed_id");
            $table->text("komentar");
            $table->timestamps();

            $table->foreign("pengirim_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("penerima_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("veed_id")->references("id")->on("upload_videos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comment_veeds');
    }
};
