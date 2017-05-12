<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\League;

use App\Match;

use App\Season;

class SeasonController extends Controller
{
    //
    public function show(Season $season){


    	$matches = $season->match;
    	return view('calendrier.calendrierLeague',compact('matches'));

    }
}
