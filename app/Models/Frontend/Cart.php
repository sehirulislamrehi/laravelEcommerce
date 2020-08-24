<?php

namespace App\Models\Frontend;

use Illuminate\Database\Eloquent\Model;
use Auth;
use App\Models\Backend\Product;


class Cart extends Model
{
    public  $fillable = [
        'visitors_id',
        'ip_address',
        'product_id',
        'product_quantity',
        'order_id',
    ];

    public function visitor(){
        return $this->belongsTo(Visitor ::class);
    }
    public function product(){
        return $this->belongsTo(Product::class);
    }
    public function order(){
        return $this->belongsTo(Order::class);
    }

    //check for auth visitor and ip
    public static function totalCarts(){
        if(  Auth('visitor')->check() ){
            $carts = Cart::where('visitors_id', Auth('visitor')->user()->id )->where('order_id', NULL)->with('product')->get() ;
        }
        else{
            $carts =   Cart::where('ip_address', request()->ip() )->where('order_id', NULL)->get();
        }

        return $carts;
    } 

    //cart total item check
    public static function totalItems(){
        if( Auth::check() ){
            $carts =  Cart::where('visitors_id', Auth('visitor')->user()->id )->where('order_id', NULL)->get();
        }
        else{
            $carts =  Cart::where('ip_address', request()->ip() )->where('order_id', NULL)->get();
        }
        $totalItem = 0;
        foreach( $carts as $cart ){
            $totalItem += $cart->product_quantity;
        }

        return $totalItem;
    } 

}
