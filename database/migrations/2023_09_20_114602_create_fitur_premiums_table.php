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
        Schema::create('fitur_premiums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('premiums_id');
            $table->string('detail_fitur_premiums');
            $table->timestamps();

            $table->foreign('premiums_id')->references('id')->on('premiums')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('fitur_premiums');
    }
};
