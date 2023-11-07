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
        Schema::create('upload_videos', function (Blueprint $table) {
            $table->id();
            $table->uuid()->unique();
            $table->unsignedBigInteger("users_id");
            $table->string("deskripsi_video");
            $table->string("upload_video");
            $table->integer("favorite_count")->default(0);
            $table->enum('isPremium', ['yes', 'no'])->default('no');

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->timestamps();
        });
        Schema::table('favorites',function (Blueprint $table){
            $table->unsignedBigInteger('feed_id')->nullable();
            $table->foreign("feed_id")->references("id")->on("upload_videos")->onDelete("cascade");
        }); 
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('upload_videos');
    }
};
