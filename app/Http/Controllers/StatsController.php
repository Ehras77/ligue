<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


use App\Team;

use App\Match;
use App\Stats;
use App\League;
use App\Season;



class StatsController extends Controller
{
    public function showMatch(Match $match){
      $localTeam = Team::where('id',$match->local_team_id)->get();
      $visitingTeam = Team::where('id',$match->visiting_team_id)->get();
      $playerLocal = Team::where('id', $match->local_team_id)->get()->player;
      dd($playerLocal);
      $season = Season::where('id',$match->season_id)->get();
      $stats = $match->stats;
      return view('match.stats',compact('localTeam','visitingTeam','stats','season','league'));

    }
}
