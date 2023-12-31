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
        Schema::create('data_pribadi_chefs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("chef_id");
            $table->string("name");
            $table->string("email");
            $table->string("number_handphone");
            $table->text("alamat");
            $table->string("foto_ktp");
            $table->string("foto_diri_ktp");
            $table->string("pilihan_bank");
            $table->string("nomer_rekening");
            $table->enum('status', ['diproses', 'diterima', 'ditolak']);
            $table->timestamps();

            $table->foreign("chef_id")->references("id")->on("users")->onDelete("cascade");
        });

        Schema::table('notifications', function (Blueprint $table) {
            $table->unsignedBigInteger('data_koki_id')->nullable();
            $table->foreign('data_koki_id')->references('id')->on('data_pribadi_chefs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_pribadi_kokis');
    }
};
