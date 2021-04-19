<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCart extends Migration
{
    public function up()
    {
        Schema::create('cart', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('quantity');
            $table->unsignedBigInteger('product_id');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('cart');
    }
}
