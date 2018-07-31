<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePurchasesStocksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('purchases_stocks', function (Blueprint $table) {
            $table->increments('id');
            $table->string('supplier');
            $table->text('address1');
            $table->integer('phone');
            $table->string('email');
            $table->string('name');
            $table->integer('quantity');
            $table->float('brate',10,2);
            $table->float('srate',10,2);
            $table->float('total',10,2);
            $table->float('payment',10,2);
            $table->text('description');
            $table->float('subtotal',10,2);
            $table->float('balance',10,2);
            $table->tinyInteger('mode');
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
        Schema::dropIfExists('purchases_stocks');
    }
}
