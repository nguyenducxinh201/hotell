<?php

namespace App\Repositories\Room;

use App\Repositories\BaseRepository;
use App\Models\Room;
use Carbon\Carbon;
use Auth;
use DB;

class RoomRepository extends BaseRepository{

    protected $model;

    public function __construct(Room $model)
    {
        $this->model=$model;
    }
 
    public function getAvailabel($id){
      return $this->model->join('lease_rooms', 'rooms.id', 'lease_rooms.room_id')
      ->where('lease_rooms.lease_active',1)
      ->select('*','rooms.id')
      ->get();
    }

    public function getByHotel($id){
        return $this->model->where('hotel_id','=',$id)->get();
    }

    public function getAllByHotel($id){
         // select * from rooms a join thue_phongs b on a.id=b.room_id 
        return DB::table('rooms')
        ->leftjoin('room_types', 'rooms.roomtype_id', '=','room_types.id')
        ->leftjoin('lease_rooms', 'rooms.id','lease_rooms.room_id')
        ->leftjoin('users','lease_rooms.user_id', 'users.id')
        ->leftjoin('book_room_details','rooms.id','book_room_details.room_id')
        ->where('rooms.hotel_id','=',$id)
        ->where(function($query){
            $query->whereNull('book_room_details.active')->orWhere('book_room_details.active','<',2);
        })
        ->groupBy('rooms.id')
        ->orderBy('receive_date')
       ->select('*','rooms.id as id')
       ->get();
       //  return DB::table('rooms')
       //  ->leftjoin('room_types', 'rooms.roomtype_id', '=','room_types.id')
       //  ->leftjoin('lease_rooms', 'rooms.id','lease_rooms.room_id')
       //  ->leftjoin('users','lease_rooms.user_id', 'users.id')
       //  ->leftjoin('book_room_details','rooms.id','book_room_details.room_id')
       //  ->where('rooms.hotel_id','=',$id)
       //  ->orderBy('rooms.id')
       // ->select('*','rooms.id','lease_rooms.lease_active')
       // ->get();
    }































    public function insert($request){
        $array=[];
        $room_name=$request->room_name;
        $roomtype_id=$request->roomtype_id;
        $note=$request->note;
        $size_name=count($room_name);
        $hotel_id=$request->hotel_id;

        for($i=0;$i<$size_name;$i++){
            if(!empty($room_name[$i])){
    array_push($array,['room_name'=>$room_name[$i],'roomtype_id'=>$roomtype_id[$i],'hotel_id'=>$hotel_id]);
            }
        }
        $this->model->insert($array);
        }



    
} 