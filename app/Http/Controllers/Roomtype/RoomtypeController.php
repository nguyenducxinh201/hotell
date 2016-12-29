<?php

namespace App\Http\Controllers\Roomtype;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Roomtype\RoomtypeRequest;
use App\Repositories\Roomtype\RoomtypeRepository;
use Auth;
use Session;

class RoomtypeController extends Controller
{
    protected $roomtypeRepository;

    public function __construct(RoomtypeRepository $roomtypeRepository)
    {
        $this->roomtypeRepository=$roomtypeRepository;
        $this->middleware('business');
    }

    public function create(){
            return view('roomtype.roomtype');
    }

    public function store(RoomtypeRequest $request){
        $this->roomtypeRepository->insert($request);
        Session::flash('msg', 'Thêm phòng thành công');
        return redirect()->back();
    }

    public function index(){
    }
} 
