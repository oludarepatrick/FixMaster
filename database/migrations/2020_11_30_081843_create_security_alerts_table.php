<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSecurityAlertsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('security_alerts', function (Blueprint $table) {
            $table->id();
            $table->ipAddress('ip_address');
            $table->macAddress('mac_address');
            $table->enum('type', ['Login Attempt', 'Intruder Alert', 'Suspended User']);
            $table->text('message'); 
            $table->timestamp('created_at');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('security_alerts');
    }
}
