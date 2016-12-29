<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaseRoom extends Model
{
    protected $table='lease_rooms';

    protected $fillable=[
        'checkin', 'checkout', 'bookroom_id', 'room_id', 'user_id', 'lease_active'
    ];
    
}
