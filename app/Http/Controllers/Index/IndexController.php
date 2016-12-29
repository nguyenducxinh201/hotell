<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Index\SearchIndexRequest;
use App\Repositories\Hotel\HotelRepository;
use App\Repositories\Roomtype\RoomtypeRepository;
use DB;
use Carbon\Carbon;
class IndexController extends Controller
{
    protected $hotelRepository;
    protected $roomtypeRepository;

    public function __construct(
        HotelRepository $hotelRepository,
        RoomtypeRepository $roomtypeRepository){
        $this->hotelRepository=$hotelRepository;
        $this->roomtypeRepository=$roomtypeRepository;
    }

    public function index(){
        return view('index.index');
    }

    public function getCity(SearchIndexRequest $request){
        $hotel=$this->hotelRepository->findBy('city',$request->city); 
        $input=$request->all();  
        return view('index.getcity')->with(['input'=>$input,'hotel'=>$hotel]);
    }

    public function show(Request $request){
        $fromX = $request->checkin.' 14:00';
        $toX = $request->checkout.' 12:00';
        // dd($fromX);

        // $fromX = $fromDate.' '.$fromTime;
        // $toX = $toDate.' '.$toTime;

         $from = Carbon::createFromFormat('d/m/Y H:i', $fromX)->format('Y-m-d H:i');
         $to = Carbon::createFromFormat('d/m/Y H:i', $toX)->format('Y-m-d H:i');

        $fromLength=Carbon::createFromFormat('d/m/Y', $request->checkin)->format('Y-m-d');
        $toLength= Carbon::createFromFormat('d/m/Y', $request->checkout)->format('Y-m-d');

        $start_date = Carbon::parse($fromLength);
        $end_date = Carbon::parse($toLength);
        $lengthOfAd = $end_date->diffForHumans($start_date);

        $arr=DB::table('book_room_details')
        ->whereIn('active',[0,1])->where(function ($queryy) use($from,$to){
            $queryy->where(function($query) use($from, $to){
                $query->where('receive_date', '>=', $from)->where('leave_date', '<=',$to);
        })
        ->orWhere(function($query) use($from, $to){
            $query->where('receive_date', '<',$from)->where('leave_date', '>',$from);
        })
        ->orWhere(function($query) use($from, $to){
            $query->where('receive_date', '<', $to)->where('leave_date', '>=', $to);
        });
        })->pluck('room_id');

        $roomAvailable = DB::table('rooms')
        ->select(DB::raw('*, count(*) as tong'))
        ->join('room_types', 'room_types.id', 'rooms.roomtype_id')
        ->join('room_prices', 'room_prices.roomtype_id', 'room_types.id')
        ->whereNotIn('rooms.id',$arr)->groupBy('rooms.roomtype_id')->get();
        dd($roomAvailable);
        // return view('bookroom.create',compact('roomAvailable', 'fromDate', 'toDate', 'lengthOfAd', 'fromTime', 'toTime'));


        // dd($roomtype);
        $hotel=$this->hotelRepository->find($id);
        return view('index.hotel')->with([
            'id'=>$id,
            'checkin'=>$checkin,
            'checkout'=>$checkout,
            'roomtype'=>$roomtype,
            'hotel'=>$hotel
            ]);
    }





    public function getIndex(){
        return view('index.indexsearch');
    }
    public function searchIndex(){

    }


}
