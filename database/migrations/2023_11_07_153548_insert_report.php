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
        Schema::table("reports", function (Blueprint $table) {
            $table->unsignedBigInteger('comment_feed_id')->nullable();
            $table->unsignedBigInteger('reply_comment_feed_id')->nullable();
            $table->unsignedBigInteger('replies_reply_comment_feed_id')->nullable();
            $table->unsignedBigInteger('feed_id')->nullable();
            // pemasangan foreignkey
            $table->foreign("feed_id")->references("id")->on("upload_videos")->onDelete("cascade");
            $table->foreign('replies_reply_comment_feed_id')->references('id')->on('balas_replies_comments_feeds')->onDelete('cascade');
            $table->foreign('reply_comment_feed_id')->references('id')->on('reply_comment_veeds')->onDelete('cascade');
            $table->foreign('comment_feed_id')->references('id')->on('comment_veeds')->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
