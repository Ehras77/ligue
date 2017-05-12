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

    	$matches = Match::where('local_team_id',$team->id)->orWhere('visiting_team_id',$team->id)->get();

    	$matches = $matches->where('season_id',$season->id);





    	//dd($matches);

    	


    	

    	return view('equipes.profile',compact('team','season','matches'));

    }
}
