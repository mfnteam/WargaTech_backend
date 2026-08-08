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
        Schema::create('lrt_trains', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->time('departure');
            $table->string('destination');
            $table->enum('type', ['jakarta', 'jabodebek']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('lrt_trains');
    }
};
