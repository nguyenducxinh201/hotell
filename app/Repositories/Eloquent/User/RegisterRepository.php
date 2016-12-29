<?php
namespace App\Repositories\Eloquent\User;

use App\User;
use Auth;
class RegisterRepository{
     private $user;

     public function __construct(User $user){
          $this->user=$user;
     }
     public function create($request){
          $users=User::create([
               'name'=>$request->name,
               'email'=>$request->email,
               'password'=>bcrypt($request->password),
               'role'=>$request->role
          ]);
          Auth::login($users);
     }
     public function checkValidEmail($email){
          return (User::where('email',$email)->count())==0;
     }
     
}
