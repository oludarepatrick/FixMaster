<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateServiceRequestDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('service_request_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('service_request_id');
            $table->bigInteger('initial_service_fee')->unsigned();
            $table->bigInteger('discount_service_fee')->unsigned();
            $table->string('phone_number', '11');
            $table->text('address');
            $table->text('description');
            $table->timestamp('timestamp');
            $table->string('media_file')->nullable();
            $table->string('payment_method');
            $table->softDeletes('deleted_at', 0);
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
        Schema::dropIfExists('service_request_details');
    }
}
