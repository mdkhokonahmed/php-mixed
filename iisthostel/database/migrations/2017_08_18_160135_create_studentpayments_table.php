<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentpaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('studentpayments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roll');
            $table->string('datecur');
            $table->string('stdname');
            $table->integer('deptId');
            $table->integer('month');
            $table->integer('monthrat');
            $table->integer('total');
            $table->integer('payment');
            $table->text('description');
            $table->integer('subtotal');
            $table->integer('balance');
            $table->tinyInteger('mode');
            $table->integer('due');
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
        Schema::dropIfExists('studentpayments');
    }
}
