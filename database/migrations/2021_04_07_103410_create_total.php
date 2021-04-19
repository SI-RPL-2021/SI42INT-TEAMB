<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTotal extends Migration
{
    public function up()
    {
        Schema::create('total', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('id_request');
            $table->foreign('id_request')->references('id')->on('request_order')->onDelete('cascade');
            $table->integer('total_price');
            $table->integer('total_things');
            //

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('total');
    }
}
