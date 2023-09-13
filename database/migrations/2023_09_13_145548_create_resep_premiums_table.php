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
        Schema::create('resep_premiums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->unsignedBigInteger("reseps_id");
            $table->timestamps();

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("reseps_id")->references("id")->on("reseps")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resep_premiums');
    }
};
