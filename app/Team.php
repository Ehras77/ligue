<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    //

    public function League(){
    	return $this->belongsTo(League::class);
    }

    public function Player(){
    	return $this->belongsToMany(Player::class);
    }

}
