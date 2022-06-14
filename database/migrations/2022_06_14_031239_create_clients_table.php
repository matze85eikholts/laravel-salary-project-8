<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clients', function (Blueprint $table) {
            $table->id();

            $table->string('client_name')->nullable();
            $table->string('city')->nullable();
            $table->string('client_ITN')->nullable();
            $table->string('legal_address')->nullable();
            $table->string('physical_address')->nullable();
            $table->string('capital')->nullable();
            $table->string('client_bank')->nullable();
            $table->string('client_bank_account')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clients');
    }
}
