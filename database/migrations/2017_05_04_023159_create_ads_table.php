<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->integer('category_id')->unsigned()->index();
            $table->integer('subcategory_id')->unsigned()->index();
            $table->string('brand')->nullable();
            $table->integer('gender_id')->unsigned();
            $table->integer('price')->unsigned()->nullable();
            $table->char('ownermsg');
            $table->string('condition');
            $table->integer('user_id')->unsigned()->index();
            $table->char('phone');
            $table->string('address');
            $table->string('consent');
            $table->integer('adminwhoallowed')->default(0);
            $table->integer('allowed')->default(0);
            $table->integer('removedbyuser')->default(0);
            $table->integer('removedbyadmin')->default(0);
            $table->integer('suspendedbyadmin')->default(0);
            $table->integer('suspendedbyuser')->default(0);
            $table->integer('sold')->default(0);
            $table->string('slug');
            $table->softDeletes();
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('ads');
    }
}
