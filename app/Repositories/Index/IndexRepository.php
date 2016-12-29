<?php

namespace App\Repositories\Index;

use App\Repositories\BaseRepository;
use App\Models\Hotel;
use Carbon\Carbon;
use Auth;

class RoomtypeRepository extends BaseRepository{

    protected $model;

    public function __construct(Hotel $model)
    {
        $this->model=$model;
    }
 



    
} 