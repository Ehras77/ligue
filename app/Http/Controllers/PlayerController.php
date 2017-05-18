<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Player;

use App\Stats;

use App\Match;

use App\Season;

use App\League;
use DB; 

class PlayerController extends Controller
{
    //

    public function show(Player $player){



    	$stats = Stats::where('player_id',$player->id)->orderBy('match_id')->get();

    	$equipe = $player->team->first();

    	$matches = Match::where('local_team_id',$equipe->id)->orWhere('visiting_team_id',$equipe->id)->get();



    	return view('joueurs.profile',compact('player','stats','matches'));

    }

    public function addPlayer(Request $request){
      $player = new Player;

      $player->first_name = $request->prenom;
      $player->last_name = $request->nom;
      $player->number = $request->numero;
      $player->position_id = $request->positionid;

      $player->save();

      DB::table('player_team')->insert(
        ['player_id' => $player->id, 'team_id' => $request->teamid]
      );

      return back();
      return redirect()->back();
    }
}
