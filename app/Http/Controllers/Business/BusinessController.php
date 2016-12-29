<?php

namespace App\Http\Controllers\Business;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
class BusinessController extends Controller
{

    public  function __construct()
    {
        $this->middleware('business');
    }	

    public function index()
    {
        $user=Auth::user()->hotel;
        if(empty($user)){
            return  redirect()->route('hotel.create');
        }
        else{
            return view('layouts.template_admin');
        }
    }

}
