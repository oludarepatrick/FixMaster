<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            // $table->string('name');
            // $table->string('username')->unique();
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('email_verification_token')->nullable();
            $table->enum('is_email_verified', ['0', '1']);
            $table->string('password');
            $table->rememberToken();
            $table->enum('designation', ['[SUPER_ADMIN_ROLE]', '[ADMIN_ROLE]', '[CSE_ROLE]', '[TECHNICIAN_ROLE]', '[SUPPLIER_ROLE]', '[TRAINEE_ROLE]', '[USER_ROLE]']);
            $table->enum('is_active', ['0', '1']);
            $table->unsignedBigInteger('login_count')->default(0);
            $table->timestamp('current_sign_in')->nullable();
            $table->timestamp('last_sign_in')->nullable();
            // $table->enum('is_deleted', ['0', '1'])->default(0);
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
        Schema::dropIfExists('users');
    }
}
