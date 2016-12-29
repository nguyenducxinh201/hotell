<?php
namespace App\Repositories\Service;

use App\Models\ServiceUser;
use App\Repositories\BaseRepository;
use DB;
use Auth;

class ServiceUserRepository  extends BaseRepository {

  protected $model;

    public function __construct(ServiceUser $model){
        $this->model=$model;
    }

    public function getAllByHotel($id)
    {
        return $this->model->where('service_users.hotel_id',$id)
        ->join('services','services.id','service_users.service_id')
        ->join('rooms','rooms.id', 'service_users.room_id')
        ->select('*','service_users.id','service_users.created_at')->get();
    }

    public function getAllByBookRoom($id)
    {
        return $this->model
        ->select(DB::raw('room_name, service_name, service_quantity,service_price, service_quantity*service_price as tongdichvu'))
        ->join('services','services.id','service_users.service_id')
        ->join('rooms','rooms.id', 'service_users.room_id')
        ->join('lease_rooms', 'lease_rooms.room_id', 'service_users.room_id')
        ->where('service_users.hotel_id',Auth::user()->hotel->id)
        ->where('service_users.service_status',0)
        ->where('lease_rooms.bookroom_id',$id)
        ->get();
    }

    /**
    * Method return all service user by book_room_id
    *
    *@param return  room_name, bookroom_id, service_quantity, service_price,  count_service
    */
    public function getByBookRoom($id)
    {
        return $this->model
        ->select(DB::raw('rooms.room_name,service_name,service_quantity, service_price, service_status, service_quantity*service_price as count_service'))
        ->join('services', 'services.id', 'service_users.service_id')
        ->join('lease_rooms','lease_rooms.room_id', 'service_users.room_id')
        ->join('rooms', 'service_users.room_id', 'rooms.id')
        ->where('service_users.service_status', 0)
        ->where('lease_rooms.bookroom_id', $id)
        ->where('service_users.hotel_id',Auth::user()->hotel->id)
        ->get();
    }

    /**
    *   Computer count price room had used
    */
    public function getPriceServiceByRoom($id)
    {
        return $this->model
        ->select(DB::raw('sum(service_quantity* service_price) as sumservice'))
        ->join('services' ,'services.id', 'service_users.service_id')
        ->where('room_id', $id)
        ->where('service_status', 0)
        ->pluck('sumservice')->first();
    }

    
  
}
