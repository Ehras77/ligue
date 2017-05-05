<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\League;

use App\Match;

use App\Season;

class MatchController extends Controller
{
    //

    public function show(League $league,Season $season){


    	$matches = $season->match;
    	return view('calendrier.calendrierLeague',compact('matches'));

    }
}
