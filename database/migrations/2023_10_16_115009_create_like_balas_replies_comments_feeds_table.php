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
        Schema::create('like_balas_replies_comments_feeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger("reply_comment_feed_id");
            $table->unsignedBigInteger('feed_id');
            $table->timestamps();

            $table->foreign('feed_id')->references('id')->on('upload_videos')->onDelete('cascade');
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("reply_comment_feed_id")->references("id")->on("balas_replies_comments_feeds")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_balas_replies_comments_feeds');
    }
};
