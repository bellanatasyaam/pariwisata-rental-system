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
        Schema::create('maintenances', function (Blueprint $table) {
            $table->string('maintenance_id')->primary();
            $table->string('vehicle_id');
            $table->string('maintenance_type');
            $table->dateTime('maintenance_date');
            $table->decimal('cost', 10, 2);
            $table->string('vendor');
            $table->timestamps();

            $table->foreign('vehicle_id')->references('vehicle_id')->on('vehicles')->cascadeOnDelete();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('maintenances');
    }
};
