<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\Http\Requests\User\LoginRequest;
use App\Repositories\User\LoginRepository;
use Illuminate\Support\MessageBag;
class LoginController extends Controller
{
        private $loginRepository;
        private $role=3;
        public function __construct(LoginRepository $loginRepository){
            $this->loginRepository=$loginRepository;
        }
 
        public function getLogin(){
            if(Auth::check() && Auth::user()->role==3){
                return redirect()->intended('admin/home');
            }
                return view('admin.login');
        }

        public function login($request){
            return $this->loginRepository->login($request,$this->role);
        }

        public function postLogin(LoginRequest $request){
            if($this->login($request)){
                return redirect()->intended('admin/home');
            }
            else{
                $errors= new MessageBag(['errorLogin'=>'Email or password not correct!']);
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }

        public function logout(Request $request)
        {
            Auth::logout();
            $request->session()->flush();
            $request->session()->regenerate();
            return redirect('admin/login');
        }
}
