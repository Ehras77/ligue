<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Season extends Model
{
    //

    public function League(){
    	return $this->belongsTo(League::class);
    }

    public function Match(){
    	return $this->hasMany(Match::class);
    }


}
