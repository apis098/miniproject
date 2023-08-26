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
        Schema::create('special_days', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reseps_id");
            $table->string('nama');
            $table->timestamps();

            $table->foreign("reseps_id")->references("id")->on("reseps")->setNullOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('special_days');
    }
};
