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
        Schema::create('reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('nama_resep');
            $table->string('foto_resep');
            $table->text('deskripsi_resep');
            $table->integer('porsi_orang');
            $table->integer('favorite_count')->default(0);
            $table->integer('lama_memasak');
            $table->integer('likes')->default(0);
            $table->bigInteger('pengeluaran_memasak');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('restrict');
        });
        Schema::create('comment_recipes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('recipes_id');
            $table->integer('likes')->default(0);
            $table->text('comment');
            $table->timestamps();

            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('recipes_id')->references('id')->on('reseps')->onDelete('cascade');
        });
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
        Schema::dropIfExists('reseps');
    }
};
