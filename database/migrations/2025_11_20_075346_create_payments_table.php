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
        Schema::create('payments', function (Blueprint $table) {
            $table->string('payment_id')->primary();
            $table->string('rental_id');

            $table->decimal('amount', 10, 2);
            $table->string('payment_method');
            $table->dateTime('payment_date');
            $table->string('status');

            $table->timestamps();

            $table->foreign('rental_id')
                ->references('rental_id')
                ->on('rentals')
                ->onDelete('cascade');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payments');
    }
};
