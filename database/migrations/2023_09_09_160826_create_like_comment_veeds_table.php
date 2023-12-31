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
        Schema::create('like_comment_veeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->unsignedBigInteger("comment_veed_id");
            $table->unsignedBigInteger("veed_id");
            $table->timestamps();

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("comment_veed_id")->references("id")->on("comment_veeds")->onDelete("cascade");
            $table->foreign("veed_id")->references("id")->on("upload_videos")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_comment_veeds');
    }
};
