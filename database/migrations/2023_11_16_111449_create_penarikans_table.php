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
        Schema::create('penarikans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chef_id");
            $table->unsignedBigInteger("data_id");
            $table->bigInteger("nilai");
            $table->enum("status", ['diproses', 'diterima', 'gagal']);
            $table->timestamps();
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger("penarikan_id")->nullable();
            $table->foreign('penarikan_id')->references('id')->on('penarikans')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penarikans');
    }
};
