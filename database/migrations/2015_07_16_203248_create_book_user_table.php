<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBookUserTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() 
    {
        Schema::create('book_user', function(Blueprint $table){
            $table->increments('id');
            $table->integer('count');
            $table->dateTime('date_booking')->nullable;
            $table->dateTime('date_return')->nullable;
        });

        Schema::table('book_user', function (Blueprint $table) {
            $table->integer('user_id')->unsigned()->nullable();
            $table->integer('book_id')->unsigned()->nullable();
            $table->foreign('user_id')->references('id')
                                      ->on('users')
                                      ->onDelete('cascade');

            $table->foreign('book_id')->references('id')
                                      ->on('books')
                                      ->onDelete('cascade');
        });
    }
    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('orders');
    }
}
