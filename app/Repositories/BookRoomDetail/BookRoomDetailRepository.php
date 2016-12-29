<?php
namespace App\Repositories\BookRoomDetail;

use App\Models\BookRoomDetail;
use App\Repositories\BaseRepository;
use DB;
use Auth;
use Carbon\Carbon;

class BookRoomDetailRepository  extends BaseRepository {

  protected $model;

    public function __construct(BookRoomDetail $model){
        $this->model=$model;
    }

    public function insert($bookoom_id,$array){
      $checkin=strtotime($array['checkin']);
      $checkout=strtotime($array['checkout']);
        return $this->model->create([
              'roomtype_id'=>$array['roomtype_id'],
              'bookroom_id'=>$bookoom_id,
              'quantity'=>$array['quantity'],
              'receive_date'=>date('Y-m-d',$checkin),
              'leave_date'=>date('Y-m-d',$checkout),
          ]);
    } 

    public function getRoomUsing($from, $to)
    {
        return DB::table('book_room_details')
            ->join('book_rooms', 'book_rooms.id', 'book_room_details.bookroom_id')
            ->where('book_rooms.hotel_id', Auth::user()->hotel->id)
            ->whereIn('active', [0,1])
            ->where(function ($queryy) use($from, $to){
                $queryy->where( function($query) use($from, $to){
                    $query->where('receive_date', '>=', $from)->where('leave_date', '<=', $to);
                }) 
                ->orWhere( function($query) use($from, $to){
                    $query->where('receive_date', '<', $from)->where('leave_date', '>', $from);
                })
                ->orWhere( function($query) use($from, $to){
                    $query->where('receive_date', '<', $to)->where('leave_date', '>=', $to);
                });
            })->pluck('room_id');
    }

    public function getRoomAvailabel($from, $to)
    {
        $roomUsing =$this->getRoomUsing($from, $to);
        return DB::table('rooms')
        ->join('room_types', 'room_types.id', 'rooms.roomtype_id')
        ->join('room_prices', 'room_prices.roomtype_id', 'room_types.id')
        ->where('rooms.hotel_id', Auth::user()->hotel->id)
        ->whereNotIn('rooms.id', $roomUsing)
        ->select('*', 'rooms.id')
        ->get();
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
