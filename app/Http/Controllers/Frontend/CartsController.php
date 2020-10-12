<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use Auth;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;
use App\Models\Backend\Product;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function cartStore(Request $request)
    {   
        $id = $request->id;
        $product = Product::find($id);

        $cart = [
            'id' => $product->id,
            'name' => $product->title,
            'image' => $product->images[0]->image,
            'qty' => 1,
            'price' => $product->regular_price ? $product->regular_price : $product->offer_price,
            'total' => $product->regular_price ? $product->regular_price : $product->offer_price,
        ];

        $newCart = [];

        $exists = false;
        if( $request->session()->get('cart') ):
            $sessionCart = $request->session()->get('cart');

            foreach( $sessionCart as $singleCart ):
                if( $singleCart['id'] == $cart['id'] ):
                    $singleCart['qty']++;
                    $singleCart['total'] = $cart['price'] * $singleCart['qty'];
                    $exists = true;
                endif;
                array_push($newCart, $singleCart);
            endforeach;
            if( !$exists ):
                array_push($newCart, $cart);
            endif;
        else:
            array_push($newCart, $cart);
        endif;
       $request->session()->put('cart', $newCart);
       return $request->session()->get('cart');
    }

    public function get_cart(Request $request){
       return $request->session()->get('cart');
    }

    public function delete_cart(Request $request, $id){
        $carts = $request->session()->get('cart');
        $newCart = [];
        if( $carts ):
            foreach( $carts as $cart):
                if( $cart['id'] != $id ){
                    array_push($newCart, $cart);
                }
            endforeach;
        endif;
        $request->session()->put('cart', $newCart);
        return $request->session()->get('cart');
    }

}
