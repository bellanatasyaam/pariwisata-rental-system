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
        Schema::create('reservations', function (Blueprint $table) {
            $table->string('reservation_id')->primary();
            $table->string('customer_id');
            $table->string('vehicle_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->string('status');
            $table->timestamps();

            $table->foreign('customer_id')->references('customer_id')->on('customers')->cascadeOnDelete();
            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reservations');
    }
};
