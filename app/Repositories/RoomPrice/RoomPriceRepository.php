<?php
namespace App\Repositories\RoomPrice;

use App\Models\RoomPrice;
use App\Repositories\BaseRepository;
use DB;
use Auth;
use Carbon\Carbon;

class RoomPriceRepository  extends BaseRepository {

  protected $model;

    public function __construct(RoomPrice $model){
        $this->model=$model;
    }
    public function getAll(){
        $hotel_id=Auth::user()->hotel->id;        
         return $u = DB::table('room_prices')
        ->join('room_types','room_types.id','room_prices.roomtype_id')
        ->select('*')
        ->get();
    }

    public function getCountPriceByRoom($leaseRoom)
    {
        $start = Carbon::parse($leaseRoom->checkin);
        $end =Carbon::parse($leaseRoom->checkout);
         $lengthMinutes = $end->diffInMinutes($start);
         $lengthDays =  $end->diffInDays($start);
         if($lengthDays > 0)        return $lengthDays * $leaseRoom->day_price;
         if($lengthMinutes > 180) return $leaseRoom->day_price;
         if($lengthMinutes > 120) return $leaseRoom->third_price;
         if($lengthMinutes >60) return $leaseRoom->second_price;
         return $leaseRoom->first_hours;
    }

  
}
