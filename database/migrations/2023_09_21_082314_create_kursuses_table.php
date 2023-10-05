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
            $table->text('nama_lokasi');
            $table->decimal('latitude', 10, 8);
            $table->decimal('longitude', 11, 8);
            $table->bigInteger('tarif_per_jam');
            $table->enum('tipe_kursus', ['perorangan', 'grup']);
            $table->integer('jumlah_siswa');
            $table->string('jenis_kursus');
            $table->enum('status', ['ditunggu', 'diterima', 'ditolak'])->default('ditunggu');
            $table->timestamp('waktu_diterima')->nullable();
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
