<?php

namespace App\Repositories\Guest;

use App\User;
use App\Repositories\BaseRepository;
use Auth;

class GuestRepository extends BaseRepository{

    protected $model;

    public function __construct(User $user)
    {
        $this->model = $user;
    }

    public function getAll()
    {
       return $this->model
       ->join('book_rooms', 'book_rooms.user_id', 'users.id')
       ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
       ->select('*', 'users.id')
       ->get(); 
    }
    

    public function search($id)
    {
      return $this->model
      ->join('book_rooms', 'book_rooms.user_id', 'users.id')
      ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
      ->where('users.name', 'LIKE', "%$id%")
      ->select('*', 'users.id')
      ->get();
    }


}