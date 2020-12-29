<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCsesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cses', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->foreignId('franchise_id')->nullable();
            $table->foreignId('state_id');
            $table->foreignId('lga_id');
            $table->foreignId('town_id');
            $table->foreignId('bank_id');
            $table->string('first_name');
            $table->string('middle_name');
            $table->string('last_name');
            $table->string('phone_number', '11')->unique();
            $table->string('other_phone_number', '11')->unique()->nullable();
            $table->string('account_number', '10')->unique()->nullable();
            $table->decimal('rating', 1, 1)->default(0);
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
        Schema::dropIfExists('cses');
    }
}
