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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile')->nullable();
            $table->integer('jumlah_pelanggaran')->default(0);
            $table->integer('followers')->default(0);
            $table->integer('like')->default(0);
            $table->string('foto')->nullable();
            $table->string('email')->unique();
            $table->integer('saldo')->default(0);
            $table->bigInteger('saldo_pemasukan')->default(0);
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->text('biodata')->nullable();
            $table->string('role');
            $table->string('status')->default('aktif');
            $table->enum("isSuperUser", ["yes", "no", "ditolak"])->default("no");
            $table->enum("status_langganan", ["sedang berlangganan", "belum berlangganan"])->default("belum berlangganan");
            $table->timestamp("awal_langganan")->nullable();
            $table->timestamp("akhir_langganan")->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
