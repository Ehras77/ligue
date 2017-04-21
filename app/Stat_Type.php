<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Stat_Type extends Model
{
    //

    public function Stats(){
    	return $this->hasMany('Stats');
    }
}
