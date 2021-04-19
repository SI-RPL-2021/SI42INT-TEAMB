<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchase extends Migration
{
    public function up()
    {
        Schema::create('purchase', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('revenue');
            $table->integer('purhcase_id');
            $table->integer('total_items');
            $table->integer('recipt');
            $table->unsignedBigInteger('cashier_id');
            $table->text('status');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('purchase');
    }
}
