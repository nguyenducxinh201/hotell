<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
     use Notifiable;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_name', 'email', 'password','role','cmnd','phone','address','dob'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    public function isBusiness(){
        return $this->role==2;
    }
    
    public function hotel(){
        return $this->hasOne('App\Models\Hotel');
    }

    public function bookrooms()
    {
        return $this->hasMany('App\Models\BookRoom');
    }
}
