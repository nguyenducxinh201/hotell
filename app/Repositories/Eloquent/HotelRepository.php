<?php
namespace App\Repositories\Eloquent;

use App\Repositories\RoomtypeRepositoryInterface;
use App\Models\Hotel;

class HotelRepository  {

  protected $hotel;

  public function  __construct(Hotel $hotel){
    $this->hotel=$hotel;
  }

  public function getRoomTypeById($id){
    return $this->hotel->find($id);
  }

    public function getAll(){
          return $this->hotel->all();
    }

    public function getById($id){
        return  $this->hotel->find($id);
    }

    public function create(array $attributes){
      return $this->hotel->create($attributes);
    }
    
    public function update($id,array $attributes){
      $todo=$this->hotel->find($id);
      $todo->update($attributes);
      return $todo;
    }
    public function delete($id){
      $this->getById($id)->delete();
      return true;
    }


    
    public function getRoomcount($id){
        return $this->hotel->roomtype()->count('quantity');
    }


}
