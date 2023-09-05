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
        Schema::create('tag_reply_comments', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reply_comment_id");
            $table->unsignedBigInteger("recipe_id");
            $table->unsignedBigInteger("user_id");
            $table->string("tag");
            $table->text("isi");
            $table->timestamps();

            $table->foreign("reply_comment_id")->references("id")->on("reply_complaints")->onDelete("cascade");
            $table->foreign("recipe_id")->references("id")->on("reseps")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tag_reply_comments');
    }
};
