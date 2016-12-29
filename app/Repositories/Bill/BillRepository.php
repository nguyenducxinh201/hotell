<?php
namespace App\Repositories\Bill;

use App\Models\Bill;
use App\Repositories\BaseRepository;

class BillRepository extends BaseRepository{
    protected $model;

    public function __construct(Bill $bill)
    {
        $this->model = $bill;
    }

    public function createe($array)
    {
        $this->model->insert($array);
    }

    public function getAllByBookRoom($id)
    {
        return $this->model
        ->join('lease_rooms', 'lease_rooms.id', 'bills.leaseroom_id')
        ->join('rooms', 'rooms.id', 'lease_rooms.room_id')
        ->where('bills.bookroom_id', $id)
        ->get();
    }
    
}