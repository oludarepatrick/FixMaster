<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateToolRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tool_requests', function (Blueprint $table) {
            $table->id();
            $table->foreignId('requested_by');
            $table->foreignId('approved_by')->nullable();
            $table->foreignId('service_request_id');
            $table->foreignId('tool_requests_batch_id');
            $table->enum('status', ['Pending', 'Approved', 'Declined'])->default('Pending');
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
        Schema::dropIfExists('tool_requests');
    }
}
