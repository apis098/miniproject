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
        Schema::create('pivot', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('kategori_bahan_id');
            $table->unsignedBigInteger('reseps_id');
            $table->timestamps();

            $table->foreign('kategori_bahan_id')->references('id')->on('kategori_bahans')->onDelete('cascade');
            $table->foreign('reseps_id')->references('id')->on('reseps')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pivot');
    }
};
