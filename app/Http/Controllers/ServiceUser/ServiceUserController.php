<?php

namespace App\Http\Controllers\ServiceUser;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceUserRequest;
use App\Repositories\Service\ServiceUserRepository;
use App\Repositories\Service\ServiceRepository;
use App\Repositories\Room\RoomRepository;
use Auth;
use Session;

class ServiceUserController extends Controller
{
    protected $serviceRepository;
    protected $serviceUserRepository;
    protected $roomRepository;

    public function __construct(
        ServiceUserRepository $serviceUserRepository,
        ServiceRepository $serviceRepository,
        RoomRepository $roomRepository
        )
    {
        $this->serviceUserRepository = $serviceUserRepository;
        $this->serviceRepository = $serviceRepository;
        $this->roomRepository = $roomRepository;
    }
    
    public function index(){
        $rooms = $this->roomRepository->getAvailabel(Auth::user()->hotel->id);
        // dd($rooms);
        $services = $this->serviceRepository->allByHotel(Auth::user()->hotel->id);
        $useServices = $this->serviceUserRepository->getAllByHotel(Auth::user()->hotel->id);
        // dd($useServices);
        return view('service.service_user')->with(['rooms' => $rooms, 'services' => $services,'useServices' =>$useServices]);
    }   
    
    public function store(ServiceUserRequest $request){
        // dd($request->all());
        $this->serviceUserRepository->create($request->all());
        Session::flash('msg','Them dich vu thanh cong');
        return redirect()->route('serviceuser.index');
        // dd($request->only(['service_id','service_quantity', 'room_id', 'hotel_id']));
    } 
}
