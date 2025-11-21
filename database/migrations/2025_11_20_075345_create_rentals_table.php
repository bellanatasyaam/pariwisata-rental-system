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
        Schema::create('rentals', function (Blueprint $table) {
            $table->string('rental_id')->primary();
            $table->string('customer_id');
            $table->string('vehicle_id');
            $table->dateTime('start_date');
            $table->dateTime('end_date');
            $table->decimal('base_cost', 10, 2);
            $table->decimal('total_amount', 10, 2);
            $table->string('status');
            $table->string('pickup_location');
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
        Schema::dropIfExists('rentals');
    }
};
