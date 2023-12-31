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
        Schema::create('income_chefs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chef_id");
            $table->unsignedBigInteger("user_id");
            $table->unsignedBigInteger('feed_id')->nullable();
            $table->unsignedBigInteger("resep_id")->nullable();
            $table->unsignedBigInteger("course_id")->nullable();
            $table->enum('status', ['resep', 'feed', 'sawer', 'kursus']);
            $table->bigInteger('pemasukan');
            $table->enum('status_penarikan', ['bisa ditarik', 'sudah ditarik', 'tidak bisa ditarik'])->default('bisa ditarik');
            $table->timestamps();

            $table->foreign("chef_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("feed_id")->references("id")->on("upload_videos")->onDelete("cascade");
            $table->foreign("resep_id")->references("id")->on("reseps")->onDelete("cascade");
            $table->foreign("course_id")->references("id")->on("kursuses")->onDelete("cascade");
        });
        Schema::table('notifications', function (Blueprint $table){
            $table->unsignedBigInteger('gift_id')->nullable();
            $table->foreign('gift_id')->references('id')->on('income_chefs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('income_chefs');
    }
};
