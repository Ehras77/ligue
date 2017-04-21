<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //

    public function League(){
    	return $this->belongsTo('League');
    }

    public function Player(){
    	return $this->belongsTo('Player','player-teams');
    }

    public function User(){

    	return $this->hasOne('User');
    }
}
