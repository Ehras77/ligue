<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //

    public function Team()
     {
         return $this->hasMany(Team::class);
     }

     public function Season()
     {
     	return $this->hasMany(Season::class);
     }

     public function League_Class()
     {
     	return $this->belongsTo('League_Class');
     }


}
