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
        Schema::create('reply_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('recipe_id')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->unsignedBigInteger('comment_recipe_id')->nullable();
            $table->unsignedBigInteger('comment_complaint_id')->nullable();
            $table->unsignedBigInteger('sender_comment_id');
            $table->unsignedBigInteger('recipient_comment_id');
            $table->integer('parent_id')->nullable();
            $table->text('comment');
            $table->enum('status_reply', ['resep', 'diskusi']);
            $table->timestamps();

            $table->foreign('recipe_id')->references('id')->on('reseps')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
            $table->foreign('comment_recipe_id')->references('id')->on('reply_comment_recipes')->onDelete('cascade');
            $table->foreign('comment_complaint_id')->references('id')->on('reply_complaints')->onDelete('cascade');
            $table->foreign('sender_comment_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipient_comment_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balas_komentars');
    }
};
