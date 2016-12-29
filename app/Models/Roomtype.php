<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Roomtype extends Model
{
    protected $table = 'room_types';
    protected $fillable=[
             'roomtype_name',
             'roomtype_quantity',
             'price',
             'guest_count',
             'bed_count',
             'roomtype_picture',
             'area',
             'direct',
             'bed_type',
             'hotel_id',
    ];

    public function hotel(){
            return $this->belongsTo('App\Models\Hotel');
    }

    public function room(){
            return $this->hasMany('App\Models\Room');
    }
}
