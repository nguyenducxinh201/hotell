<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotel extends Model
{
    protected $table = 'hotels';
    protected $fillable=[
             'hotel_name',
             'hotel_type',
             'rank_star',
             'city',
             'township',
             'street',
             'hotel_phone',
             'website',
             'hotel_active',
             'user_id',
     ];
     
    public function user(){
        return $this->belongsTo('App\Models\User');
    } 
    public function roomtype(){
        return $this->hasMany('App\Models\Roomtype');
    }
    public function room(){
        return $this->hasMany('App\Models\Room');
    }
    public function hotelPicture(){
        return$this->hasMany('App\Models\HotelPicture');
    }
} 
