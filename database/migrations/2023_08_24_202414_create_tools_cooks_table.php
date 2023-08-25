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
        Schema::create('tools_cooks', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("recipes_id");
            $table->string('nama_alat');
            $table->timestamps();
            
            $table->foreign("recipes_id")->references("id")->on("reseps")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tools_cooks');
    }
};
