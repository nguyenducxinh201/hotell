<?php

namespace App\Repositories\Roomtype;

use App\Repositories\BaseRepository;
use App\Models\Roomtype;
use Carbon\Carbon;
use Auth;

class RoomtypeRepository extends BaseRepository{

    protected $model;

    public function __construct(Roomtype $model)
    {
        $this->model=$model;
    }
 
    public function insert($request){
        $file = $request->file('roomtype_picture');
        $now = Carbon::now();
        $pictureName = $now->toDateTimeString().$file->getClientOriginalName();
        $path=config('path.pictureroomtype');
        $file->move($path, $pictureName);
        return $this->model->create([
              'roomtype_name'=>$request->roomtype_name,
              'roomtype_quantity'=>$request->roomtype_quantity,
              'guest_count'=>$request->guest_count,
              'bed_count'=>$request->bed_count,
              'roomtype_picture'=>$pictureName,
              'area'=>$request->area,
              'direct'=>$request->direct,
              'bed_type'=>$request->bed_type,
              'hotel_id'=>Auth::user()->hotel->id,
            ]);
    }

    public function getByHotel($id){
      return $this->model->where('hotel_id','=',$id)->get();
    }

    /**
    * return all roomtype by hotel. ->where('hotel_id', Auth::user()->hotel->id)->select('id', 'roomtype_name')->get();
    */
    public function getAll()
    {
      return $this->model
      ->where('hotel_id', Auth::user()->hotel->id)->select('id', 'roomtype_name')->get();
    }
    
} 