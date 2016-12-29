<?php

namespace App\Http\Controllers\LeaseRoom;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\LeaseRoom\LeaseRoomRepository;
use App\Repositories\BookRoom\BookRoomRepository;
use App\Repositories\Service\ServiceUserRepository;
use Carbon\Carbon;
use Session;
use Auth;

class LeaseRoomController extends Controller
{
    protected $leaseRoomRepository;
    protected $bookRoomRepository;
    protected $serviceUserRepository;

    public function __construct(
        ServiceUserRepository $serviceUserRepository,
        LeaseRoomRepository $leaseRoomRepository,
        BookRoomRepository $bookRoomRepository
        )
    {
        $this->leaseRoomRepository = $leaseRoomRepository;
        $this->bookRoomRepository = $bookRoomRepository;
        $this->serviceUserRepository = $serviceUserRepository;
    }

    public function index()
    {
       $leaseRooms = $this->leaseRoomRepository->getAllById(Auth::user()->hotel->id);
       // dd($leaseRooms);
        return view('leaseroom.index',compact('leaseRooms'));
    }
 
    public function create()
    {
        return view('leaseroom.create');
    }

    public function search(Request $request)
    {
        $leaseRooms = $this->leaseRoomRepository->search($request->id);
        return view('leaseroom.index',compact('leaseRooms'));
    }
    public function show($id)
    {
        $serviceUsers = $this->serviceUserRepository->getByBookRoom($id);
        $bookRooms = $this->bookRoomRepository->getById($id);
        // dd($bookRooms);
        if($bookRooms->isEmpty()){
            return redirect()->route('leaseroom.index');           
        }
        else{
            return view('leaseroom.show',compact('bookRooms','serviceUsers'));
        }
    }

    public function edit($id){

    }
    public function update(Request $request){

    }

    public function store(Request $request){
        
    } 
}
