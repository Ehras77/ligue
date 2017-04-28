<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Position extends Model
{
    //
    public function Player(){
    	return $this->hasMany(Player::class);
    }

}
