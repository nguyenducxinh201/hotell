<?php
namespace App\Repositories\Eloquent;

use App\Repositories\RoomtypeRepositoryInterface;
use App\Models\Roomtype;

class RoomtypeRepository implements RoomtypeRepositoryInterface{

	protected $roomtype;
	public function  __construct(Roomtype $roomtype){
		$this->roomtype=$roomtype;
	}

	public function getRoomTypeById($id){
		return $this->roomtype->find($id);
	}

    public function getAll(){
          return $this->roomtype->all();
    }

    public function getById($id){
        return  $this->roomtype->find($id);
    }

    public function create(array $attributes){
      return $this->roomtype->create($attributes);
    }
    
    public function update($id,array $attributes){
      $todo=$this->roomtype->find($id);
      $todo->update($attributes);
      return $todo;
    }

    public function delete($id){
      $this->getById($id)->delete();
      return true;
    }
    public function getRoomcountById($id){
      return $this->getById()->quantity;
      // return $this->roomtype->find()sum('quantity');
    }

    public function getRoomcountByHotel($id){
      return $this->roomtype::where('hotel_id','=',$id)->sum('quantity');
    }


}