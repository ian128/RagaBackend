<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCourtsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('courts', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('accounts');
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->string('email',100)->unique();
            $table->string('photo',100)->unique();
            $table->float('weekday_price');
            $table->float('weekend_price');
            $table->string('location',100);
            $table->string('phone_number',100);
            // $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('courts');
    }
}
