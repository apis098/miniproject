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
        Schema::create('reply_comment_recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->integer('likes')->default(0);
            $table->unsignedBigInteger("recipe_id");
            $table->unsignedBigInteger("comment_id");
            $table->text("komentar");
            
            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("recipe_id")->references("id")->on("reseps")->onDelete("cascade");
            $table->foreign("comment_id")->references("id")->on("comment_recipes")->onDelete("cascade");
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
     
    }
};
