<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCaffeTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('caffes', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('title');
            $table->string('area');
            $table->string('station');
            $table->string('streetAddress');
            $table->string('phoneNumber');
            $table->string('siteurl');
            $table->boolean('wifi');
            $table->integer('powerNumber');
            $table->string('seatNumber');
            $table->string('price');
            $table->integer('noise');
            $table->integer('comfortable');
            $table->string('body');
            $table->string('image_path')->nullable();
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
        Schema::dropIfExists('caffes');
    }
}
