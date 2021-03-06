<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMessagerepliesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('messagereplies', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('message_id')->unsigned()->index();
            $table->integer('ad_id')->unsingned()->index();
            $table->integer('user_id')->unsigned()->index();
            $table->integer('sender_id')->insigned()->index();
            $table->string('name');
            $table->string('email');
            $table->char('phone');
            $table->char('message');
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
        Schema::dropIfExists('messagereplies');
    }
}
