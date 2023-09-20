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
        Schema::create('history_premiums', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger("users_id");
            $table->unsignedBigInteger('premiums_id');
            $table->string('reference');
            $table->string('merchant_ref')->nullable();
            $table->bigInteger('total_amount');
            $table->enum('status', ['paid', 'unpaid'])->default('unpaid');
            $table->timestamps();

            $table->foreign("users_id")->references("id")->on("users")->onDelete("cascade");
            $table->foreign("premiums_id")->references("id")->on("premiums")->onDelete("cascade");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('history_premiums');
    }
};
