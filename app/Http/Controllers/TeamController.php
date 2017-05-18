<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Season;

use App\Team;

use App\Match;
use App\Player;

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

    public function editForm(Team $team){
      $season = Season::orderby('start_date','DESC')->first();

    	$matches = Match::where('local_team_id',$team->id)->orWhere('visiting_team_id',$team->id)->get();

    	$matches = $matches->where('season_id',$season->id);
      $players = $team->player;




    	//dd($matches);


    	return view('equipes.edit',compact('team','season','matches','players'));

    }

    public function store(Team $team){
      $team->id = $team->id;
      $team->name = request('teamName');
      $team->league_id = $team->league_id;
      $team->user_id = $team->user_id;
      $team->created_at = $team->created_at;
      $team->updated_at = $team->updated_at;
      $team->save();
      return redirect('/equipe/'. $team->id );
    }




}
