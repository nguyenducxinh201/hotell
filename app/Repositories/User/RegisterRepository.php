<?php
namespace App\Repositories\User;

use App\User;
use Auth;
use App\Repositories\BaseRepository;
use Carbon\Carbon;

class RegisterRepository extends BaseRepository{
     protected $model;

     public function __construct(User $model){
          $this->model=$model;
     }

     public function createGuest($request)
     {
        return $this->model->create([
            'name' => $request['name'],
            'cmnd' => $request['cmnd'],
            'phone' => $request['phone'],
            'dob' => Carbon::createFromFormat('d/m/Y', $request['dob'])->format('Y-m-d'),
            'role' => $request['role']
            ]);
     }
     
}