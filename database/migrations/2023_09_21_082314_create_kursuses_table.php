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
        Schema::create('kursuses', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->string('nama_kursus');
            $table->string('foto_kursus');
            $table->text('deskripsi_kursus');
            $table->string('lokasi_kursus');
            $table->bigInteger('tarif_per_jam');
            $table->integer('jumlah_pelajaran');
            $table->enum('tipe_kursus', ['perorangan', 'grup']);
            $table->string('lama_kursus');
            $table->timestamps();

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kursuses');
    }
};
