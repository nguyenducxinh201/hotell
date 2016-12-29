<?php

namespace App\Http\Controllers\Room;

use App\Http\Controllers\Controller;
use App\Repositories\Room\RoomRepository;
use App\Repositories\Roomtype\RoomtypeRepository;
use App\Http\Requests\Room\RoomRequest;
use Auth;
use Session;

class RoomController extends Controller
{
    protected $roomRepository;
    protected $roomtypeRepository;

    public function __construct( RoomRepository $roomRepository, RoomtypeRepository $roomtypeRepository)
    {
      $this->roomRepository=$roomRepository;
      $this->roomtypeRepository=$roomtypeRepository;
      $this->middleware('business');
    }

    public function index(){
        $listArrayRoom = $this->roomRepository->getAllByHotel(Auth::user()->hotel->id);
        $roomTypes = $this->roomtypeRepository->getAll();
        return view('room.index',compact('listArrayRoom', 'roomTypes' ));
    }

    public function store(RoomRequest $request){
         $this->roomRepository->create($request->all());
         Session::flash('msg','Thêm phòng thành công!');
        return redirect()->route('room.index');
    }  
}
