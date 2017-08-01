<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdviewcountersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('adviewcounters', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('ad_id')->unsigned()->inndex();
            $table->integer('counter')->default(0)->unsigned();
            $table->timestamps();


            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('adviewcounters');
    }
}
