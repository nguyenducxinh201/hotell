<?php

namespace App\Http\Controllers\RoomPrice;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\RoomPrice;
use App\Http\Requests\RoomPrice\RoomPriceRequest;
use App\Repositories\RoomPrice\RoomPriceRepository;
use App\Models\Roomtype;
use Session;
use Auth;

class RoomPriceController extends Controller
{
    protected $roomPriceRepository;

    public function __construct(RoomPriceRepository $roomPriceRepository)
    {
        $this->roomPriceRepository = $roomPriceRepository;
    }

    public function index()
    {
        $roomPrice=$this->roomPriceRepository->getAll();
        // dd($roomPrice);
        return view('roomprice.index')->with(['roomPrice' => $roomPrice]);
    } 

    public function create()
    {
        $roomTypes = Roomtype::all();
        return view('roomprice.create')->with(['roomTypes'=>$roomTypes]);
    }

    public function store(RoomPriceRequest $request)
    {
        $this->roomPriceRepository->create($request->all());
        Session::flash('msg','Create Room price Successful!!!');
        return redirect()->back();
    }
}
