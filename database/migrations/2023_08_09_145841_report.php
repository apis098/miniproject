n<?php

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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->unsignedBigInteger('reply_id_report')->nullable();
            $table->unsignedBigInteger('user_id_sender')->nullable();
            $table->unsignedBigInteger('reply_id_complaint')->nullable();
            $table->unsignedBigInteger('comment_id')->nullable();
            $table->unsignedBigInteger('reply_comment_id')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->unsignedBigInteger('resep_id')->nullable();
            $table->unsignedBigInteger('profile_id')->nullable();
            $table->string('description');
            $table->timestamps();

            $table->foreign('comment_id')->references('id')->on('comment_recipes')->onDelete('cascade');
            $table->foreign('reply_comment_id')->references('id')->on('reply_comment_recipes')->onDelete('cascade');
            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->foreign('reply_id_complaint')->references('id')->on('reply_complaints')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('profile_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
            $table->foreign('resep_id')->references('id')->on('reseps')->onDelete('cascade');
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
