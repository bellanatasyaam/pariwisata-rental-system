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
            // sebelum menambah UNIQUE constraint
            // pastikan tidak ada email duplikat

            // tambahkan UNIQUE
            $table->unique('email');
        });
    }

    public function down(): void
    {
        Schema::table('customers', function (Blueprint $table) {
            // hapus UNIQUE jika rollback
            $table->dropUnique(['email']);
        });
    }

};
