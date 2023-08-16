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
            $table->unsignedBigInteger('follower_id')->nullable();
            $table->unsignedBigInteger('like_id')->nullable(); 
            $table->unsignedBigInteger('reply_id')->nullable(); 
            $table->unsignedBigInteger('complaint_id')->nullable(); 
            $table->string('status')->default('belum');
            $table->timestamps();

            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->foreign('notification_from')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('follower_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('like_id')->references('id')->on('likes')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
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
