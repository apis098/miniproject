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
        Schema::create('kategori_reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reseps_id");
            $table->unsignedBigInteger("kategori_reseps_id")->nullable();
            $table->timestamps();

            $table->foreign("reseps_id")->references("id")->on("reseps");
            $table->foreign("kategori_reseps_id")->references("id")->on("kategori_makanans");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kategori_reseps');
    }
};
