<?php
namespace App\Repositories\Hotel;

use App\Models\Hotel;
use App\Repositories\BaseRepository;
use DB;

class HotelRepository  extends BaseRepository {

  protected $model;

  public function __construct(Hotel $model){
    $this->model=$model;
  }

  public function getAll()
  {
    return $this->model
    ->join('users', 'hotels.user_id', 'users.id')
    ->select('*', 'hotels.id')
    ->get();
  }

  public function getRoomtype($id){
        return DB::table('room_types')
        ->join('room_prices', 'room_types.id', 'room_prices.roomtype_id')
        ->where('room_types.hotel_id','=',$id)->get();
  }
  public function getAllRoom($id){
            return DB::table('hotels')
            ->join('room_types', 'hotels.id', '=','room_types.hotel_id')
            ->where('hotels.id','=',$id)
            ->select('*')
            ->get();
  }

  public function search($id)
  {
       return $this->model
    ->join('users', 'hotels.user_id', 'users.id')
    ->where('hotel_name', 'LIKE', "%$id%")
    ->select('*', 'hotels.id')
    ->get(); 
  }
  
}
