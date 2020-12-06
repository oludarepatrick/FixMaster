<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdminPermissionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('admin_permissions', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->unique();
            $table->enum('administrators', ['0', '1'])->default(0);
            $table->enum('clients', ['0', '1'])->default(0);
            $table->enum('cses', ['0', '1'])->default(0);
            $table->enum('location_request', ['0', '1'])->default(0);
            $table->enum('payments', ['0', '1'])->default(0);
            $table->enum('payment_gateways', ['0', '1'])->default(0);
            $table->enum('ratings', ['0', '1'])->default(0);
            $table->enum('requests', ['0', '1'])->default(0);
            $table->enum('rfqs', ['0', '1'])->default(0);
            $table->enum('service_categories', ['0', '1'])->default(0);
            $table->enum('technicians', ['0', '1'])->default(0);
            $table->enum('tools', ['0', '1'])->default(0);
            $table->enum('utilities', ['0', '1'])->default(0);
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
        Schema::dropIfExists('admin_permissions');
    }
}
