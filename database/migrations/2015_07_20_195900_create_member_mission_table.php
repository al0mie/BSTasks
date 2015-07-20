<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMemberMissionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        
        Schema::create('member_mission', function(Blueprint $table){
            $table->increments('id');
        });

        Schema::table('member_mission', function (Blueprint $table) {
            $table->integer('member_id')->unsigned()->nullable();
            $table->integer('mission_id')->unsigned()->nullable();

            $table->foreign('member_id')->references('id')
                                      ->on('members')
                                      ->onDelete('cascade');
            $table->foreign('mission_id')->references('id')
                                      ->on('missions')
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
        //
    }
}
