<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;

use App\Stats;

use App\Match; 

use App\Season;

use App\League;

class PlayerController extends Controller
{
    //

    public function show(Player $player){



    	$stats = Stats::where('player_id',$player->id)->orderBy('match_id')->get();

    	$equipe = $player->team->first();

    	$matches = Match::where('local_team_id',$equipe->id)->orWhere('visiting_team_id',$equipe->id)->get();



    	return view('joueurs.profile',compact('player','stats','matches'));

    }
}
