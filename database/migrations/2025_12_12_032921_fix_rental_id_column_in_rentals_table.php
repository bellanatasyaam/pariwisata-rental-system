<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('rentals', function (Blueprint $table) {
            // Ubah rental_id jadi nullable biar bisa auto-generate dari model
            $table->string('rental_id')->nullable()->change();
        });
    }

    public function down()
    {
        Schema::table('rentals', function (Blueprint $table) {
            $table->string('rental_id')->change();
        });
    }
};
