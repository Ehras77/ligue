<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Match extends Model
{
    //
    public function Season()
    {
         return $this->belongsTo('Season');
    }

    public function Stats(){
    	return $this->hasMany('Stats');
    }


}
