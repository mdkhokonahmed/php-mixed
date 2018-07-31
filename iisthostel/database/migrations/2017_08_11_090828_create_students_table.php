<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStudentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('students', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('roomid')->nullable();
            $table->string('seater');
            $table->integer('feesmonth')->nullable();
            $table->integer('departmentid')->nullable();
            $table->string('stdname');
            $table->integer('rool')->nullable();
            $table->string('gender');
            $table->integer('contact')->nullable();
            $table->integer('emrcontact')->nullable();
            $table->string('garname');
            $table->integer('garcontact')->nullable();
            $table->text('address');
            $table->string('city');
            $table->string('state');
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
        Schema::dropIfExists('students');
    }
}
