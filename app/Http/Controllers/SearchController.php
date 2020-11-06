<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class SearchController extends Controller
{
    public function searchA($userName){

         if(strlen($userName) > 1){
             $users = User::where('name', 'like', '%'.$userName.'%')
             ->orWhere('email','like', '%'.$userName.'%')->get();
             if(count($users)> 0){
                return $users; 
             }
             return 'Not found';
         }
              
    }
    
}
