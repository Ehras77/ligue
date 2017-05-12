<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

use App\League;

use App\Player;

class LeagueController extends Controller
{
    //

    public function showTeamStats(League $league){

    	$teams = $league->team;


    	return view('league.classementTeams',compact('teams'));

    }

    public function showPlayersStats(League $league){

    	$teams = $league->team;

    	return view('league.classementPlayers',compact('teams'));

    }
}
