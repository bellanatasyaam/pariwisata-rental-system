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
        Schema::table('customers', function (Blueprint $table) {

            // Tambah unique email (kalau belom)
            // Pastikan dulu tidak ada email duplikat di database kamu
            // Kalau ragu, skip dulu baris ini
            // $table->unique('email');

            $table->string('driver_license')->nullable()->change();
            $table->string('customer_type')->nullable()->change();
            $table->date('registration_date')->nullable()->change();

            $table->string('status')->default('active')->change();
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            $table->string('driver_license')->nullable(false)->change();
            $table->string('customer_type')->nullable(false)->change();
            $table->date('registration_date')->nullable(false)->change();
            $table->string('status')->default(null)->change();
        });
    }

};
