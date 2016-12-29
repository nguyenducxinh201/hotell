<?php

namespace App\Http\Controllers\Storage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Repositories\Storage\StorageRepository;

class StorageController extends Controller
{
    protected $storageRepository;

    public function __construct(StorageRepository $storageRepository)
    {
        $this->storageRepository = $storageRepository;
    }

    public function index()
    {

    }

    public function create()
    {

    }

    public function store()
    {
        
    }
}
