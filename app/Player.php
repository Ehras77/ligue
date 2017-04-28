<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Player extends Model
{
    //
    public function Team(){
    	return $this->belongsToMany(Team::class);
    }

    public function Position(){
    	return $this->belongsTo(Position::class);
    }

    public function Stats(){
    	return $this->hasMany(Stats::class);
    }

    public function user(){
    	return $this->hasOne(User::class);
    }
}
