<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMatchesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('matches', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('season_id');
            $table->integer('local_team_id');
            $table->integer('visiting_team_id');
            $table->string('location');
            $table->string('winning_team');
            $table->string('losing_team');
            $table->integer('final_score_local');
            $table->integer('final_score_visitor');
            $table->datetime('date');
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
        Schema::dropIfExists('matches');
    }
}
