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
        Schema::create('balas_replies_comments_feeds', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("pengirim_reply_comment_id");
            $table->unsignedBigInteger("pemilik_reply_comment_id");
            $table->unsignedBigInteger("reply_comment_id");
            $table->unsignedBigInteger("parent_id")->nullable();
            $table->text("komentar");
            $table->timestamps();

            $table->foreign("pengirim_reply_comment_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("pemilik_reply_comment_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("reply_comment_id")->references("id")->on("reply_comment_veeds")->onDelete("cascade");  
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('balas_replies_comments_feeds');
    }
};
