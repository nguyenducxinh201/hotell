<?php

namespace App\Http\Controllers\BookRoom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookRoom\BookRoomRepository;
use App\Repositories\BookRoomDetail\BookRoomDetailRepository;
use App\Repositories\Room\RoomRepository;
use App\Repositories\User\RegisterRepository;
use Session;
use Auth;
use DB;
use Carbon\Carbon;
use DateTime;

class BookRoomController extends Controller
{
    protected $bookRoomDetailRepository;
    protected $bookRoomRepository;
    protected $roomRepository;
    protected $registerRepository;

    public function __construct(
        BookRoomRepository $bookRoomRepository,
        BookRoomDetailRepository $bookRoomDetailRepository,
        RoomRepository $roomRepository,
        RegisterRepository $registerRepository ) 
    {
        $this->bookRoomRepository = $bookRoomRepository;
        $this->bookRoomDetailRepository = $bookRoomDetailRepository;
        $this->roomRepository = $roomRepository;
        $this->registerRepository = $registerRepository;
    }

    public function index()
    {
        $listDatPhong = $this->bookRoomRepository->getAllHotel();
        return view('bookroom.index',compact('listDatPhong'));
    }

    public function search(Request $request)
    {
        $listDatPhong = $this->bookRoomRepository->search($request->id);
        return view('bookroom.index', compact('listDatPhong'));
    }

    public function create()
    {
        $arrRoom = DB::table('rooms')
        ->join('room_types', 'room_types.id', 'rooms.roomtype_id')
        ->join('room_prices', 'room_types.id', 'room_prices.roomtype_id')
        // ->where('rooms.active',0)
        ->select('rooms.id', 'rooms.room_name', 'room_types.roomtype_name', 'room_prices.day_price')
        ->get();
        return view('bookroom.create')->with(['arrRoom' => $arrRoom]);
    }

    public function store(Request $request)
    {
        $from = $request->receive_date.' '.$request->receive_time; 
        $to = $request->leave_date.' '.$request->leave_time;
        
        $date = Carbon::now();
        $guest = $this->registerRepository->createGuest($request->only(['name', 'cmnd', 'phone', 'dob', 'role']));

        $bookroom = $this->bookRoomRepository->create([
            'deposit' => $request->deposit,
            'user_id' => $guest->id,
            'hotel_id' => Auth::user()->hotel->id,
            'bookroom_note' => $request->bookroom_note,
        ]);

        foreach ($request->room as  $value) {
            $this->bookRoomDetailRepository->create([
                'room_id' => $value,
                'bookroom_id' =>$bookroom->id,
                'receive_date' =>Carbon::createFromFormat('d/m/Y H:i',$from)->format('Y-m-d H:i'),
                'leave_date' =>Carbon::createFromFormat('d/m/Y H:i',$to)->format('Y-m-d H:i'),
            ]);
        }
        return redirect()->route('bookroom.index');
    }

    public function show($id)
    {
        $listDatPhong = $this->bookRoomRepository->findById($id);
        if(!$listDatPhong)
        {
            return redirect()->route('bookroom.index');
        }
        return view('bookroom.show', compact('listDatPhong'));
    }

    public function update($id, Request $request)
    {
        $this->bookRoomRepository->update(['bookroom_active' => $request->bookroom_active],$id);
        Session::flash('msg', 'Thành công');
        if($request->bookroom_active==2){
            return redirect()->route('bill.show',[$id]);
        }
        return redirect()->back();
    }

    public function searchdate(Request $request)
    {
        $fromDate = $request->receive_date;
        $toDate = $request->leave_date;

        $fromTime = $request->receive_time;
        $toTime = $request->leave_time;

        $fromX = $fromDate.' '.$fromTime;
        $toX = $toDate.' '.$toTime;

         $from = Carbon::createFromFormat('d/m/Y H:i',$fromX)->format('Y-m-d H:i');
         $to = Carbon::createFromFormat('d/m/Y H:i',$toX)->format('Y-m-d H:i');

        $fromLength=Carbon::createFromFormat('d/m/Y',$fromDate)->format('Y-m-d');
        $toLength= Carbon::createFromFormat('d/m/Y',$toDate)->format('Y-m-d');

        $start_date = Carbon::parse($fromLength);
        $end_date = Carbon::parse($toLength);
        $lengthOfAd = $end_date->diffForHumans($start_date);

        $roomAvailable = $this->bookRoomDetailRepository->getRoomAvailabel($from, $to);
        return view('bookroom.create',compact('roomAvailable', 'fromDate', 'toDate', 'lengthOfAd', 'fromTime', 'toTime'));
    }


    public function edit($id)
    {
    
    }
    public function destroy($id)
    {
        $this->bookRoomRepository->delete($id);
        Session::flash('msg', 'Xóa thành công!!');
        return redirect()->back();
    }
    /**
    * Dat phong online
    */
    public function datphong(Request $request)
    {
        if(session()->has('datphong')){
            $arr = Session::get('datphong');
            $model = $this->bookRoomRepository->insert($arr[0]);
            $id = $model->id;
            foreach ($arr as $key => $value) {
            $this->bookRoomDetailRepository->insert($id, $value);
            }
        }
    }
}
