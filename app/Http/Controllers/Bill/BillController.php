<?php

namespace App\Http\Controllers\Bill;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\BookRoom\BookRoomRepository;
use App\Repositories\Service\ServiceUserRepository;
use App\Repositories\LeaseRoom\LeaseRoomRepository;
use App\Repositories\RoomPrice\RoomPriceRepository;
use App\Repositories\Bill\BillRepository;
use DB;
use Carbon\Carbon;

class BillController extends Controller
{

    protected $bookRoomRepository;
    protected $serviceUserRepository;
    protected $leaseRoomRepository;
    protected $roomPriceRepository;
    protected $billRepository;

    public function __construct(
        BookRoomRepository $bookRoomRepository,
        ServiceUserRepository $serviceUserRepository,
        LeaseRoomRepository $leaseRoomRepository,
        RoomPriceRepository $roomPriceRepository,
        BillRepository $billRepository
        )
    {
        $this->bookRoomRepository = $bookRoomRepository;
        $this->serviceUserRepository = $serviceUserRepository;
        $this->leaseRoomRepository = $leaseRoomRepository;
        $this->roomPriceRepository = $roomPriceRepository;
        $this->billRepository = $billRepository;
    }

    public function show($id) 
    {

        $bookrooms = $this->bookRoomRepository->find($id)->with('user')->where('book_rooms.id', $id)->first();
        // $price = $this->bookRoomRepository->price($id);
        $detail = $this->bookRoomRepository->getById($id);
        $services = $this->serviceUserRepository->getAllByBookRoom($id);
        $bills = $this->billRepository->getAllByBookRoom($id); 
        return view('bill.show',compact('bookrooms', 'detail', 'services', 'bills'));



    }
    public function index()
    {

    }
    public function update()
    {

    }

    public function updateBill($id)
    {
        $bills  = array();
        $leases =  $this->leaseRoomRepository->getAllByBookBoom($id); 
        foreach ($leases as $lease) {
            $priceRoom = $this->roomPriceRepository->getCountPriceByRoom($lease);
            $priceService = $this->serviceUserRepository->getPriceServiceByRoom($lease->room_id);
            array_push($bills, [
                'bookroom_id' => $lease->bookroom_id, 
                'leaseroom_id' => $lease->id,
                'room_price' =>  $priceRoom,
                'service_price' =>$priceService,
                'count_price' => $priceRoom+$priceService
            ]);
        }
        $this->billRepository->createe($bills);
    }

}
