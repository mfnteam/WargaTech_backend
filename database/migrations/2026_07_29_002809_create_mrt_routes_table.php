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
        Schema::create('mrt_routes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('mrt_stations')->cascadeOnDelete();
            $table->unsignedBigInteger('train_id');
            $table->foreign('train_id')->references('id')->on('mrt_trains')->cascadeOnDelete();
            $table->integer('order');
            $table->integer('travel_time');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('mrt_routes');
    }
};
