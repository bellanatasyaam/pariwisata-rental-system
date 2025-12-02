<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up()
    {
        Schema::create('chart_of_accounts', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('name');
            $table->string('category')->nullable();    
            $table->string('type');                       
            $table->decimal('start_balance', 15, 2)->default(0);
            $table->text('description')->nullable();
            $table->enum('balance_type', ['debit','credit'])->default('debit');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('chart_of_accounts');
    }
};
