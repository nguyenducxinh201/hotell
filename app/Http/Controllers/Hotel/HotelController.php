<?php

namespace App\Http\Controllers\Hotel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Hotel\HotelRequest;
use App\Repositories\Hotel\HotelRepository;
use Auth;
use Session;

class HotelController extends Controller
{
    protected $hotelRepository;

    public function __construct(HotelRepository $hotelRepository)
    {
        $this->hotelRepository= $hotelRepository; 
    }

    public function index(){
        $hotels = $this->hotelRepository->getAll();
        return view('hotel.index', compact('hotels'));
    }

    public function search(Request $request)
    {
        $hotels = $this->hotelRepository->search($request->id);
        return view('hotel.index', compact('hotels'));
    }

    public function create(){
        $idhotel=Auth::user()->hotel;
         if($idhotel==null){
            return view('hotel.create');
         }
         return redirect('business/home');
    }

    public function store(HotelRequest $request){
        $this->hotelRepository->create($request->all());
         return redirect('business/home');
    }

    public function show($id){
        return "show";
    }

    public function destroy($id)
    {
        $this->hotelRepository->delete($id);
        Session::flash('msg', 'Xóa thành công');
        return redirect()->back();
    }

    public function update($id, Request $request)
    {
        $this->hotelRepository->update(['hotel_active' => $request->hotel_active],$id);
        Session::flash('msg', 'Xác nhận thành công');
        return redirect()->back();
    }

}
