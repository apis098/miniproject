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
        Schema::create('hari_reseps', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("reseps_id");
            $table->unsignedBigInteger("hari_khusus_id")->nullable();
            $table->timestamps();

            $table->foreign("reseps_id")->references("id")->on("reseps")->onDelete('cascade');
            $table->foreign("hari_khusus_id")->references("id")->on("special_days");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hari_reseps');
    }
};
