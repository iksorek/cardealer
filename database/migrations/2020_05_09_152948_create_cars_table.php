<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCarsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cars', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users');
            $table->string('type')->default('sedan');
            $table->string('make');
            $table->string('model');
            $table->string('fuel')->nullable(true);
            $table->string('engine')->nullable(true);
            $table->string('color')->nullable(true);
            $table->integer('year')->nullable(true);
            $table->string('gearbox')->default('manual');
            $table->integer('mileage')->nullable(true);
            $table->integer('price')->nullable(true);
            $table->longText('extras')->nullable(true);
            $table->longText('description')->nullable(true);
            $table->string('status')->default(__('messages.just_added'));
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
        Schema::dropIfExists('cars');
    }
}
