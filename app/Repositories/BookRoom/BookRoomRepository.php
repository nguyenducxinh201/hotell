<?php
namespace App\Repositories\BookRoom;

use App\Models\BookRoom;
use App\Repositories\BaseRepository;
use DB;
use Auth;

class BookRoomRepository  extends BaseRepository {

  protected $model;

    public function __construct(BookRoom $model){
        $this->model=$model;
    }


 
    public function insert($array){
        $md5_hash = md5(rand(0,999));
        $security_code = substr($md5_hash, 5,30);
        // dd($array);
       return  $this->model->create([
            'mapin'=>$security_code,
            'user_id'=>Auth::user()->id,
            'hotel_id'=>$array['hotel_id']
            ]);
    } 

  /**
  * @return BookRoom BookRoomDetail Guest
  */
    public function findById($id)
    {
        return $this->model
        ->join('book_room_details', 'book_room_details.bookroom_id', 'book_rooms.id')
        ->join('rooms', 'book_room_details.room_id', 'rooms.id')
        ->join('users', 'book_rooms.user_id', 'users.id')
        ->where('book_rooms.id', $id)
        ->select('*', 'book_rooms.id')
        ->get();
    }

    public function getById($id)
    {
      return DB::table('book_rooms')
      ->select(DB::raw('*,timestampdiff(hour,receive_date,leave_date) as count_hour,datediff(leave_date,receive_date) as count_day ' ))
      ->join('book_room_details', 'book_rooms.id', 'book_room_details.bookroom_id')
      ->join('users', 'book_rooms.user_id', 'users.id')
      ->join('rooms', 'book_room_details.room_id', 'rooms.id')
      ->join('room_prices','room_prices.roomtype_id', 'rooms.roomtype_id')
      ->join('room_types', 'rooms.roomtype_id','room_types.id')
      ->join('lease_rooms', 'lease_rooms.room_id', 'book_room_details.room_id')
      ->where('book_rooms.id', $id)
      // ->select('*', 'book_room_details.created_at')
      ->get();
    }

    public function price($id)
    {
      return DB::table('book_room_details')
      ->select(DB::raw('*, timestampdiff(hour,receive_date, leave_date) as count_hour,datediff(leave_date,receive_date) as count_day'))
      ->join('rooms', 'rooms.id', 'book_room_details.room_id')
      ->join('room_prices', 'rooms.roomtype_id', 'room_prices.roomtype_id')
      ->where('book_room_details.bookroom_id',$id);
    }

    /**
    * return all room, bookroom, bookroomdetail by hotel_id
    */
    public function getAllHotel()
    {
      return $this->model
        ->join('book_room_details', 'book_rooms.id', 'book_room_details.bookroom_id')
        ->join('users', 'book_rooms.user_id', 'users.id')
        ->join('rooms', 'book_room_details.room_id', 'rooms.id')
        ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
        ->select('*', 'book_rooms.created_at', 'book_rooms.bookroom_active', 'book_rooms.id')
        ->orderBy('book_rooms.created_at', 'DESC')
        ->get();
    }

    public function search($id)
    {
      if(is_numeric($id))
      {
        return $this->model
            ->join('book_room_details', 'book_rooms.id', 'book_room_details.bookroom_id')
            ->join('users', 'book_rooms.user_id', 'users.id')
            ->join('rooms', 'book_room_details.room_id', 'rooms.id')
            ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
            ->where('book_room_details.bookroom_id', 'LIKE', $id)
            ->select('*', 'book_rooms.created_at', 'book_rooms.bookroom_active', 'book_rooms.id')
            ->orderBy('book_rooms.created_at', 'DESC')
            ->get();
      } else{
          return $this->model
            ->join('book_room_details', 'book_rooms.id', 'book_room_details.bookroom_id')
            ->join('users', 'book_rooms.user_id', 'users.id')
            ->join('rooms', 'book_room_details.room_id', 'rooms.id')
            ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
            ->where('users.name', 'LIKE', "%$id%")
            ->select('*', 'book_rooms.created_at', 'book_rooms.bookroom_active', 'book_rooms.id')
            ->orderBy('book_rooms.created_at', 'DESC')
            ->get();
      }
        //       if(is_numeric($request->id)){
        //     dd('num');
        // }
        // else{
        //     dd('not num');
        // }
        // dd($request->id);

    }

  // public function getRoomtype($id){
  //       return DB::table('roomtypes')->where('hotel_id','=',$id)->get();
  // }
  // public function getAllRoom($id){
  //           return DB::table('hotels')
  //           ->join('roomtypes', 'hotels.id', '=','roomtypes.hotel_id')
  //           ->where('hotels.id','=',$id)
  //           ->select('*')
  //           ->get();
  // }
  
}
