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
            $table->foreignId('user_id')->unique();
            $table->foreignId('state_id');
            $table->foreignId('lga_id');
            $table->foreignId('town_id');
            $table->string('first_name');
            $table->string('last_name');
            $table->string('phone_number', '11')->unique();
            $table->string('occupation')->nullable();
            $table->string('avatar')->nullable();
            $table->text('full_address');            
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
