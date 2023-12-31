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
        Schema::create('daliya', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('password');
            $table->string('address');
            $table->string('image');
            $table->string('total_d');
            $table->string('total_p');
            $table->string('result');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daliya');
    }
};
