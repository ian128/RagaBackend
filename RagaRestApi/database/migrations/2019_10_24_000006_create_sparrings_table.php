<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSparringsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sparrings', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name',100);
            $table->integer('sport_id')->unsigned();
            $table->foreign('sport_id')->references('id')->on('sports');
            $table->integer('court_id')->unsigned();
            $table->foreign('court_id')->references('id')->on('courts');
            $table->date('date');
            $table->bigInteger('price_per_person');
            $table->string('start_time',100);
            $table->string('end_time',100);
            $table->string('desc',100);
            $table->string('who_can_play',100);
            $table->string('repeat_every_week',100);
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('accounts');
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
        Schema::dropIfExists('sparrings');
    }
}
