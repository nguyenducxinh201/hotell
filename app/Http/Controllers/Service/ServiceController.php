<?php

namespace App\Http\Controllers\Service;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Service\ServiceRequest;
use App\Repositories\Service\ServiceRepository;
use Session;
use Auth;

class ServiceController extends Controller
{
    protected $serviceRepository;
    public function __construct(ServiceRepository $serviceRepository){
        $this->serviceRepository = $serviceRepository;
    }

    public function index(){
        $listServices = $this->serviceRepository->allByHotel(Auth::user()->hotel->id);
        return view('service.create')->with('listServices',$listServices);
    }
    
    public function store(ServiceRequest $request)
    {
        Session::flash('msg','Them dich vu thanh cong');
        $this->serviceRepository->create($request->all());
        return redirect()->route('service.index');
    }
    public function destroy($id)
    {
        $this->serviceRepository->delete($id);
        Session::flash('msg','Delete service successful');
        return redirect()->route('service.index');
    }

    public function update(){
        
    }
}
