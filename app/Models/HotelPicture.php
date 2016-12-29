<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HotelPicture extends Model
{
    protected $table='hotel_pictures';

    protected $fillable=[
        'path',
        'hotel_id'
    ];
}
