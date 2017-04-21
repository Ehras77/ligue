<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public function Team(){
    	return $this->belongsTo('Team','player_teams');
    }

    public function Position(){
    	return $this->belongsTo('Position');
    }

    public function Stats(){
    	return $this->hasMany('Stats');
    }
}
