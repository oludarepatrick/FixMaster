<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('categories', function (Blueprint $table) {

            // $table->id('category_id')->unsigned()->after('id');
            // $table->foreign('category_id','fk_service_category_id')->references('id')->on('services')->onUpdate('CASCADE')->onDelete('CASCADE');
            // $table->foreign('user_id')->references('id')->on('users')->onUpdate('SET NULL')->onDelete('SET NULL');
            // $table->foreign('user_id')->references('id')->on('users');

            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('service_id');
            $table->string('name')->unique();
            $table->enum('is_active', ['0', '1'])->default(0);
            $table->integer('standard_fee')->unsigned();
            $table->integer('urgent_fee')->unsigned();
            $table->integer('ooh_fee')->unsigned();
            $table->text('description');
            $table->string('image');
            $table->unsignedBigInteger('total_votes')->default(0);
            $table->float('rating', 1, 1)->default(0);
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
        // $table->dropForeign('fk_service_category_id');
        Schema::dropIfExists('categories');
    }
}
