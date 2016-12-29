<?php
namespace App\Repositories\Eloquent;

use App\Models\Room;
use DB;
class ListRoomRepository{

     private $room;

     public function __construct(Room $room){
               $this->room=$room;
     }

     public function getAllHotel($id){
          return $this->room::where('hotel_id',$id)->get();

     }
     public function getAllRomtype($id){
          return DB::table('rooms')
               ->join('roomtypes', 'rooms.roomtype_id','=','roomtypes.id')
               ->where('rooms.hotel_id',$id)
               ->get();
     }


}
