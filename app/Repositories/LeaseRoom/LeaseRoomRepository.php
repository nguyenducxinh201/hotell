<?php

namespace App\Repositories\LeaseRoom;

use App\Repositories\BaseRepository;
use App\Models\LeaseRoom;
use Carbon\Carbon;
use Auth;

class LeaseRoomRepository extends BaseRepository{

    protected $model;

    public function __construct(LeaseRoom $model)
    {
        $this->model=$model;
    }

    public function getAllById($id){
        return $this->model
        ->join('rooms', 'rooms.id', 'lease_rooms.room_id')
        ->join('book_rooms', 'book_rooms.id', 'lease_rooms.bookroom_id')
        ->join('users','book_rooms.user_id', 'users.id')
        ->where('lease_rooms.lease_active',1)
        ->where('book_rooms.hotel_id',$id)
        ->get();
    }

    public function search($id)
    {
        return $this->model
        ->join('rooms', 'rooms.id', 'lease_rooms.room_id')
        ->join('book_rooms', 'book_rooms.id', 'lease_rooms.bookroom_id')
        ->join('users','book_rooms.user_id', 'users.id')
        // ->where('lease_rooms.lease_active',1)
        ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
        ->where('users.name', 'LIKE', "%$id%")
        ->get();
    }

    /**
    * Used get leaseRoom,  room,. first, second, third, day_price
    * Return array. to calculate price
    */
    public function getAllByBookBoom($id)
    {
        return  $this->model
        ->join('rooms', 'lease_rooms.room_id', 'rooms.id')
        ->join('room_prices', 'rooms.roomtype_id', 'room_prices.roomtype_id')
        ->where('lease_rooms.bookroom_id', $id)
        ->where('lease_rooms.lease_active', 2)
        ->select('*', 'lease_rooms.id')
        ->get();
    }
    
} 