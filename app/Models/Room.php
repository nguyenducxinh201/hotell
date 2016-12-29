<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $table='rooms';
    protected $fillable=[
      'room_name',
      'room_active',
      'room_note',
      'roomtype_id',
      'hotel_id'
    ];

    public function roomtype(){
      return $this->belongsTo('App\Models\Roomtype');
    }

    public function hotel(){
      return $this->belongsTo('App\Models\Hotel');
    }
}
