<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League extends Model
{
    //

    public function Team()
     {
         return $this->hasMany('Team');
     }

     public function Season()
     {
     	return $this->hasMany('Season');
     }

     public function League_Class()
     {
     	return $this->belongsTo('League_Class');
     }


}
