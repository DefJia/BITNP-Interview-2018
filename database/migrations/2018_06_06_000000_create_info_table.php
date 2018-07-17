<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInfoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {if (!Schema::hasTable('info')) {
        Schema::create('info', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            // sex major sid phone photo current first second is campus work_time intro view if problem room time note
            $table->char('sex');
            $table->string('phone');
            $table->string('photo');
            $table->string('current');
            $table->string('first');
            $table->string('second')->nullable();
            $table->char('is')->nullable();
            $table->string('campus');
            $table->integer('work_time');
            $table->string('intro');
            $table->string('view');
            $table->string('if');
            $table->string('problem');
            $table->string('room');
            $table->string('time');
            $table->string('note');
            //$table->foreign('name')->references('name')->on('users');
        });
    }}

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('info');
    }
}

