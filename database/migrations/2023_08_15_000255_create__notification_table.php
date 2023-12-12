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
        Schema::create('notifications', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('notification_from')->nullable();
            $table->unsignedBigInteger('verifed_id')->nullable();
            $table->unsignedBigInteger('follower_id')->nullable();
            $table->unsignedBigInteger('reply_id_report')->nullable();
            $table->integer('complaint_id_report')->nullable();
            $table->integer('resep_id_report')->nullable();
            $table->integer('veed_id_report')->nullable();
            $table->integer('balas_reply_comment_feed_report')->nullable();
            $table->integer('reply_comment_feed_report')->nullable();
            $table->integer('comment_feed_report')->nullable();
            $table->string('random_name')->nullable();
            $table->string('alasan')->nullable();
            $table->string('message')->nullable();
            $table->integer('top_up_id')->nullable();
            $table->unsignedBigInteger('like_id')->nullable();
            $table->unsignedBigInteger('like_reply_id')->nullable();
            $table->unsignedBigInteger('reply_id_comment')->nullable();
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->unsignedBigInteger('resep_id')->nullable();
            $table->unsignedBigInteger('like_comment_recipes_id')->nullable();
            $table->unsignedBigInteger('like_reply_comment_recipes_id')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('reply_comment_id')->nullable();
            $table->string('route')->nullable();
            $table->string('status')->default('belum');
            $table->string('categories')->nullable();
            $table->timestamps();

            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->foreign('notification_from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('resep_id')->references('id')->on('reseps')->onDelete('cascade');
            $table->foreign('verifed_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_notification');
    }
};
