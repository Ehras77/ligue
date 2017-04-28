<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stats extends Model
{
    //
    public function Player(){
    	return $this->belongsTo(Player::class);
    }

    public function Match(){
    	return $this->belongsTo(Match::class);
    }

    public function Stat_Type(){
    	return $this->belongsTo(Stat_Type::class);
    }
}
