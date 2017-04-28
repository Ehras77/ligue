<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePlayersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('players', function (Blueprint $table) {
            $table->increments('id');
            $table->string('first_name');
            $table->string('last_name');
            $table->integer('number');
            $table->integer('position_id');
            $table->integer('user_id')->nullable();
            $table->timestamps();
        });

        Schema::create('player_teams',function(Blueprint $table){

            $table->integer('player_id');
            $table->integer('team_id');
            $table->primary(['player_id','team_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('players');
        Schema::dropIfExists('player_teams');
    }
}
