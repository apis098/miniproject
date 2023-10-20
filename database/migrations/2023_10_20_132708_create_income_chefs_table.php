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
            $table->enum('status', ['resep', 'feed', 'sawer']);
            $table->bigInteger('pemasukan');
            $table->timestamps();

            $table->foreign("chef_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("user_id")->references("id")->on("users")->onDelete("cascade");
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
