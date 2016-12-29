<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRoomDetail extends Model
{
    protected $table='book_room_details';

    protected $fillable=[
        'room_id',
        'bookroom_id',
        'receive_date',
        'leave_date',
        'note',
        'active',
    ];

    public function bookRoom(){
        return $this->belongsTo('App\Models\BookRoom');
    }
}
