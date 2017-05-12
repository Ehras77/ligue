<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Season;

use App\Team;

use App\Match;

class TeamController extends Controller
{
    //

        public function show(Team $team){

    	$season = Season::orderby('start_date','DESC')->first();

    	$matches = Match::where('season_id',$season->id)->get();



    	return view('equipes.profile',compact('team','season','matches'));

    }
}
