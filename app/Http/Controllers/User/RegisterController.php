<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\User\RegisterRequest;
use App\Repositories\Eloquent\User\RegisterRepository;
use Auth;

class RegisterController extends Controller
{
     private $registerRepository;

     public function __construct(RegisterRepository $registerRepository){
          $this->registerRepository=$registerRepository;
     }

    public function getRegister(){
          return view('user.register');
    }
    public function create($registerRequest){
          $this->registerRepository->create($registerRequest);
    }
    public function postRegister(RegisterRequest $request){
          // dd($this->registerRepository->checkValidEmail($request->email));
           $this->create($request);
           return redirect()->intended('indexx');
    }
}
