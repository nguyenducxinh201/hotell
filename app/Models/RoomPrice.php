<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RoomPrice extends Model
{
    protected $table = 'room_prices';

    protected $fillable = [
        'season', 'roomtype_id', 'first_hours', 'second_hours', 'third_hours', 'day_price','hotel_id'
    ];

    public function roomType(){
        return $this->belongsTo('App\Models\Roomtype');
    }
}
