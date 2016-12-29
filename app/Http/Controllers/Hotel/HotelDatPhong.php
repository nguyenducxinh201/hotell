<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\User\RegisterRepository;
use App\Repositories\BookRoom\BookRoomRepository;
use App\Repositories\BookRoomDetail\BookRoomDetailRepository;
use App\RegisterRepository\Roomtype\RoomtypeRepository;
use Auth;
use App\Models\Roomtype;

class HotelDatPhong extends Controller
{
    protected $registerRepository,$bookRoomDetailRepository, $bookRoomRepository;

    public function __construct(RegisterRepository $registerRepository,
        BookRoomRepository $bookRoomRepository, 
        BookRoomDetailRepository $bookRoomDetailRepository)
    {
        $this->registerRepository = $registerRepository;
        $this->bookRoomDetailRepository = $bookRoomDetailRepository;
        $this->bookRoomRepository = $bookRoomRepository;
    }

//dat tai khach san
    public function index(){
        $room=Roomtype::where('hotel_id',Auth::user()->hotel->id)->get();
        return view('bookroom.bookroom')->with('room',$room);
    }
    public function datphong(Request $request){
        dd($request);
        $user = $this->registerRepository->create([
                'name'=>$request->name,
                'cmnd' => $request->cmnd,
                'phone' => $request->phone,
                'address' => $request->address,
                'dob' => $request->dob,
                'email' => $request->email,
                'role' => 0
            ]);

        $md5_hash = md5(rand(0,999));
        $security_code = substr($md5_hash, 5,30);
        $bookRoom=$this->bookRoomRepository->create([
                'mapin'=>$security_code,
                'user_id'=>$user->id,
                'hotel_id'=>Auth::user()->id,
                'tiencoc' => $request->tiencoc,
            ]);

            $checkin=strtotime($request->ngayhennhan);
            $checkout=strtotime($request->ngayhentra);

            $count=count($request->roomtype_id);
            for($i=0;$i<$count;$i++){
            if($request->quantity[$i]!=null){
            $bookRooomdl = $this->bookRoomDetailRepository->create([
            'roomtype_id'=>$request->roomtype_id[$i],
            'dat_phong_id'=>$bookRoom->id,
            'quantity'=>$request->quantity[$i],
            'ngayhennhan'=>date('Y-m-d',$checkin),
            'ngayhentra'=>date('Y-m-d',$checkout),
                ]);
            }
            }
            return "ok";
    }

    public function dsdatphong(){
        return view('hotel.dsdatphong');
    }

    
}
