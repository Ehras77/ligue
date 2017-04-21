<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class League_Class extends Model
{
    //

    public function League()
    {
         return $this->hasMany('League');
     }
}
