<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\User;
use Auth;
use Redirect;
class RegisterController extends Controller
{
    public function getRegister(){
    	return view('admin/register');
    }
    
    public function postRegister(Request $request){
    	$rules=[
    		'name'=>'required | min:5',
    		'email'=>'email | required | unique:users',
    		'password'=>'required | min:5 | confirmed' ,
    		'password_confirmation'=>'required',
    	];
    	$validator=Validator::make($request->all(),$rules);
    	if(!$validator->fails()){
    		$user=User::create([
    				'name'=>$request->name,
    				'email'=>$request->email,
    				'password'=>bcrypt($request->password),
    				'role'=>$request->role
    			]);
	    		Auth::login($user);
	    		 return redirect()->intended('admin/home');
    	}
    	return redirect()->back()->withErrors($validator)->withInput();
    }
}
