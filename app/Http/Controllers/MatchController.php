<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\League;

use App\Match;

use App\Season;

use App\Team;

class MatchController extends Controller
{
    //
	public function show(Match $match){
      $localTeam = Team::where('id',$match->local_team_id)->get();
      $visitingTeam = Team::where('id',$match->visiting_team_id)->get();
      

      $season = Season::where('id',$match->season_id)->get();
      $stats = $match->stats;
      return view('match.stats',compact('match','localTeam','visitingTeam','stats','season','league'));

    }

}
