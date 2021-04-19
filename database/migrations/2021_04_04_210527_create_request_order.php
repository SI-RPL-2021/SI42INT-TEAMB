<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRequestOrder extends Migration
{
    public function up()
    {
        Schema::create('request_order', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->unsignedBigInteger('product_id');
            $table->integer('recipt');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->text('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('request_order');
    }
}
