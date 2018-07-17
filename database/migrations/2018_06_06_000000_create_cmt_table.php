<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCmtTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {if (!Schema::hasTable('cmt')) {
        Schema::create('cmt', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('eeid');
            $table->integer('erid');
            $table->integer('pts');
            $table->string('cmt');
            $table->timestamp('created_at')->nullable();

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
        Schema::dropIfExists('cmt');
    }
}
