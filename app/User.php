<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    public function roles()
     {
        return $this->belongsToMany('Role', 'roles_users');
     }


     public function player(){
        return $this->hasOne(Player::class);
     }

     public function isAdmin(){


            foreach ($this->roles()->get() as $role)
            {
                if ($role->name == 'Admin')
                {
                    return true;
                }
            }

        return false;
    }


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
}
