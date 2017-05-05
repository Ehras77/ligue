<?php

namespace App\API\V1\Controllers;

use App\Http\Controllers\Controller;
use App\Transformers\UserTransformer;
use Dingo\Api\Routing\Helpers;
use App\User;
use App\Match;

class MarquerMatchController extends Controller
{
    use Helpers;


    public function show($id){
      $match = Match::get()->where('id', $id);
    	return view('StatsMatch',compact($match));

    }

    public function getUsers()
    {

        $users = User::first();
        dd($users);
        return $this->response->collection($users, null);

    }
}
