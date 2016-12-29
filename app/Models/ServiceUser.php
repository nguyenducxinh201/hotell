<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServiceUser extends Model
{
    protected $table='service_users';
    protected $fillable= ['service_quantity', 'service_id', 'hotel_id', 'room_id','service_status'];
}
