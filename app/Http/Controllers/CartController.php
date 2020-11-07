<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cart;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{   
    public function index($user_id){
        $cart = Cart::where('user_id', $user_id)->with('product')->get();
        return $cart;
    }

    public function store(Request $request){
        
       $data =  $request->validate([
            'user_id' => 'required|integer',
            'product_id' => 'required|integer'
        ]);
        $userCart = Cart::where('user_id',$request->user_id)->get();
        foreach($userCart as $u){
            if($request->product_id == $u->product_id){
                return "false";
            }
        };
        if(Auth::id() == $request->user_id){}
        $cart = new Cart();
        try{
            $cart->create($data);
            return 'true';              
        }catch(exception $err){ 
            echo $err;
        };
    }
}
