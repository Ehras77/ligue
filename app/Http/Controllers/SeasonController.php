<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\League;

use App\Match;

use App\Season;

use App\Team;

class SeasonController extends Controller
{
    //
    public function show(Season $season,Request $request){

    	$equipe =0;

    	if ($request->has('team')) {
       		$equipe = $request->input('team');
		}

    	$matches = $season->match;

		$idEquipes = [];
			foreach($matches as $match){
				$idEquipes[] = $match->local_team_id;
				$idEquipes[] = $match->visiting_team_id;
			}

			
		$teams = Team::whereIn('id',$idEquipes)->get();

		if($equipe <> 0){
			$matches = Match::where('local_team_id',$equipe)->orWhere('visiting_team_id',$equipe)->get();
			$matches = $matches->where('season_id',$season->id);
		}

    	return view('calendrier.calendrierLeague',compact('matches','teams','equipe'));

    }
}
