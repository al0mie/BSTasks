<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateForeignKeysTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('missions', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')
                                      ->on('missionstatus')
                                      ->onDelete('cascade');
        });

        Schema::table('goals', function (Blueprint $table) {
            $table->foreign('status_id')->references('id')
                                      ->on('goalstatus')
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
