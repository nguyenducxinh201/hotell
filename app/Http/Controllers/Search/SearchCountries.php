<?php

namespace App\Http\Controllers\Search;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchCountries extends Controller
{
        public function index(Request $request){
                $array=[$request->term,'asd',$request->term];
           //  $array=['da nang','ho chi minh','sai gon'];
           echo json_encode($array);
        }

        public function searchCountries(Request $request){
            $array=[$request->term,'da nang','da nang'];
            echo json_encode($array);
        }
}
