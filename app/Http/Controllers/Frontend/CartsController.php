<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Frontend\Cart;
use App\Models\Frontend\Order;
use Auth;
use App\Http\Resources\CartResource;
use App\Http\Resources\CartCollection;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        
        return view('frontend.pages.cart');
       
    }

    public function get(){
        $cart = Cart::orderBy('id', 'asc')->get();
        return view('frontend.pages.cart.getCarts', compact('cart'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'product_id' => 'required',
        ],
        [
            'product_id.required' => 'Please choose your product',
        ]);

       
        if( Auth::check() ){
            $cart = CART::where('visitors_id', Auth('visitor')->user()->id )->where('product_id', $request->product_id)->first();
        }
        else{
            $cart = CART::where('ip_address', request()->ip() )->where('product_id', $request->product_id)->first();
        }

        if( !is_null($cart) ){
            $cart->increment('product_quantity');
        }
        else{
            $cart = new Cart();
            if( Auth::check() ){
                $cart->visitors_id = Auth('visitor')->user()->id; 
            }
            else{
                $cart->ip_address = request()->ip();
                $cart->product_id = $request->product_id;
                $cart->save();
            }
            
        }
        if(  Auth::check() ){
            $carts = Cart::where('visitors_id', Auth('visitor')->user()->id )->where('order_id', NULL)->with('product')->get() ;
        }
        else{
            $carts =   Cart::where('ip_address', request()->ip() )->where('order_id', NULL)->get();
        }
        return response()->json(['status' => 'success', 'Message' => 'Item Added To Cart', 'totalItems' => new CartCollection($carts), 'totalNumber' => Cart::totalItems() ], 200);
       
       
        

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cart $cart)
    {
        if( !is_null($cart) ){
            $cart->delete();
        }
        return back();
    }
}
