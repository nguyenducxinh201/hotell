<?php
namespace App\Repositories\User;

use App\User;
use Auth;
class UserRepository{
     private $user;

     public function __construct(User $user){
          $this->user=$user;
     }
     

     
}