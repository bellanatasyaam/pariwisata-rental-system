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
        Schema::create('vehicles', function (Blueprint $table) {
            $table->string('vehicle_id')->primary();
            $table->string('make');
            $table->string('model');
            $table->string('category');
            $table->string('license_plate');
            $table->decimal('daily_rate', 10, 2);
            $table->string('status');
            $table->string('location');
            $table->integer('mileage');
            $table->date('last_maintenance');
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('vehicles');
    }
};
