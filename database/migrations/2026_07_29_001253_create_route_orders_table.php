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
        Schema::create('route_orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('station_id');
            $table->foreign('station_id')->references('id')->on('train_stations')->cascadeOnDelete();
            $table->unsignedBigInteger('route_id');
            $table->foreign('route_id')->references('id')->on('train_routes')->cascadeOnDelete();
            $table->integer('order');
            $table->integer('travel_time');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('route_orders');
    }
};
