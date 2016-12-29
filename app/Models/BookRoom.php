<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BookRoom extends Model
{
    protected $table='book_rooms';
    protected $fillable=[
        'deposit',
        'bookroom_note',
        'bookroom_active',
        'user_id',
        'hotel_id'
    ];
    // protected $timestamps = true;

    public function book_room_details(){
        return $this->hasMany('App\Models\BookRoomDetail');
    }
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
