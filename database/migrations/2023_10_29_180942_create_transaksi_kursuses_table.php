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
        Schema::create('transaksi_kursuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('course_id');
            $table->unsignedBigInteger('chef_id');
            $table->unsignedBigInteger('user_id');
            $table->enum('status_transaksi', ['diterima', 'ditolak']);
            $table->date('tanggal_status_transaksi')->nullable();
            $table->bigInteger('harga');
            $table->timestamps();

            $table->foreign('course_id')->references('id')->on('kursuses')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('chef_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('transaksi_kursuses');
    }
};
