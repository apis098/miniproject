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
        Schema::create('reports', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('reply_id')->nullable();
            $table->unsignedBigInteger('user_id_sender')->nullable();
            $table->unsignedBigInteger('complaint_id')->nullable();
            $table->unsignedBigInteger('user_id');
            $table->string('description');
            $table->timestamps();

            $table->foreign('reply_id')->references('id')->on('replies')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('user_id_sender')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onDelete('cascade');
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
