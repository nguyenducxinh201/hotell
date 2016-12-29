<?php
namespace App\Repositories\Service;

use App\Models\Service;
use App\Repositories\BaseRepository;
use DB;
use Auth;

class ServiceRepository  extends BaseRepository {

  protected $model;

    public function __construct(Service $model){
        $this->model=$model;
    }
    public function allByHotel($id){
        return $this->model->where('hotel_id',$id)->get();
    }
  
}
