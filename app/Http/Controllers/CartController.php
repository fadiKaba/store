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
        
        if(Auth::check() && Auth::id() == $request->user_id){
            $data =  $request->validate([
                'user_id' => 'required|integer',
                'product_id' => 'required|integer'
            ]);
            $userCart = Cart::where('user_id',Auth::id())->get();
            if(count($userCart) > 0){        
                foreach($userCart as $u){            
                   if($request->product_id == $u->product_id){
                       $el = Cart::where('user_id', Auth::id())->where('product_id',$u->product_id)->with('product')->get(); //$u->with('product')->get();
                       $u->delete();
                       return [false, $el];          }             
               };
               $cart = new Cart();
               try{
                  $cr =  $cart->create($data);
                   return [true, Cart::where('user_id', Auth::id())->where('product_id',$cr->product_id)->with('product')->get()];              
               }catch(exception $err){ 
                   echo $err;
               };
            }else{            
                $cart = new Cart();
                try{
                  $cr = $cart->create($data);
                    return [true, Cart::where('user_id', Auth::id())->where('product_id',$cr->product_id)->with('product')->get()];              
                }catch(exception $err){ 
                    echo $err;
                };
            }       
        }  return 'unauthorized';    
    }
}
