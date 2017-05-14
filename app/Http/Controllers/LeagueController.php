<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Team;

use App\League;

use App\Player;

use App\Season;

class LeagueController extends Controller
{
    //

    public function showTeamStats(Request $request){

    	$ligue = 0;
    	$saison= 0;

    	 if ($request->has('season')) {
       		$saison = $request->input('season');
		}

		 if ($request->has('league')) {
       		$ligue = $request->input('league');
		}


		if($saison <> 0){
			$laSaison = Season::where('id',$saison)->first();

			$matches = $laSaison->match;

			$idEquipes = [];
			foreach($matches as $match){
				$idEquipes[] = $match->local_team_id;
				$idEquipes[] = $match->visiting_team_id;
			}

			
			$teams = Team::whereIn('id',$idEquipes)->get();
		}

		
		if($ligue <> 0){
			$season = Season::where('league_id',$ligue)->get();


			if($saison == 0){
				$teams= Team::all();
			}


		}
		else{
			$season = Season::all();			
			$teams = Team::all();
		}


		$allLeague = League::all();

		$league = League::where('id',$ligue)->get();


    	return view('league.classementTeams',compact('teams','season','allLeague','saison','ligue'));

    }

    public function showPlayersStats(Request $request){

    	$ligue = 0;
    	$saison= 0;

    	 if ($request->has('season')) {
       		$saison = $request->input('season');
		}

		 if ($request->has('league')) {
       		$ligue = $request->input('league');
		}


		if($saison <> 0){
			$laSaison = Season::where('id',$saison)->first();

			$matches = $laSaison->match;

			$idEquipes = [];
			foreach($matches as $match){
				$idEquipes[] = $match->local_team_id;
				$idEquipes[] = $match->visiting_team_id;
			}

			
			$teams = Team::whereIn('id',$idEquipes)->get();
		}


		if($ligue <> 0){
			$season = Season::where('league_id',$ligue)->get();

			if($saison == 0){
				$teams= Team::all();
			}

		}
		else{
			$season = Season::all();			
			$teams = Team::all();
		}


		$allLeague = League::all();

		$league = League::where('id',$ligue)->get();



    	return view('league.classementPlayers',compact('teams','season','allLeague','saison','ligue'));

    }
}
