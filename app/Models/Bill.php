<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bills';

    protected $fillable = [
        'bookroom_id',
        'leaseroom_id',
        'room_price',
        'service_price',
        'count_price'
    ];
}
