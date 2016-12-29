<?php
namespace App\Repositories\Storage;

use App\Repositories\BaseRepository;
use App\Models\Storage;

class StorageRepository extends BaseRepository{

    protected $model;
    
    public function __construct(Storage $model){
        $this->model=$model;
    }

}