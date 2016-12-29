<?php
namespace App\Repositories\User;

use App\User;
use Auth;
class LoginRepository{
     private $user;

     public function __construct(User $user){
          $this->user=$user;
     }
     public function login($request, $role){
          $email=$request->email;
          $password=$request->password;
          if(Auth::attempt(['email'=>$email,'password'=>$password,'role'=>$role])){
               return true;
          }
          else{
               return false;
          }
         }

     
     }