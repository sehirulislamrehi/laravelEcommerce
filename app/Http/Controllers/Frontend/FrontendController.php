<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use Illuminate\Support\Str;
use App\Visitor;
use App\Models\Backend\Category;

use App\Models\Backend\Banner;

class FrontendController extends Controller
{   
    public function home(){
        $feature_products   = Product::orderBy('id','asc')->where('is_featured',1)->get();
        $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
        $banners = Banner::orderBy('id', 'desc')->get();

        return view('frontend.pages.index', compact(
            'feature_products', 'banners','pCategories'
        ));
    }
    public function about(){
        $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
    	return view('frontend.pages.about',compact('pCategories'));
    }
    
    public function contact(){
    	return view('frontend.pages.contact');
    }
    public function blog(){
    	return view('frontend.pages.blog');
    }
    public function account(){
    	return view('frontend.pages.account');
    }
    public function editaccount(){
        return view('frontend.pages.editmyaccount');
    }
    public function cart(){
    	return view('frontend.pages.cart');
    }
    public function checkout(){
    	return view('frontend.pages.checkout');
    }
    public function compare(){
    	return view('frontend.pages.compare');
    }
    public function component(){
    	return view('frontend.pages.component');
    }
    public function faq(){
    	return view('frontend.pages.faq');
    }
    public function post(){
    	return view('frontend.pages.post');
    }
    public function product(){
    	return view('frontend.pages.product');
    }
    public function termsandcondition(){
    	return view('frontend.pages.termsandcondition');
    }
    public function trackorder(){
    	return view('frontend.pages.trackorder');
    }
    public function typography(){
    	return view('frontend.pages.typography');
    }
    public function wishlist(){
    	return view('frontend.pages.wishlist');
    }
    public function visitorLogin(){
        return view('frontend.pages.login');
    }
    public function visitorRegister(){
        return view('frontend.pages.register');
    }
    public function error(){
    	return view('frontend.pages.404');
    }
    public function search( Request $request ){
        $search = $request->search;
        $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
        $latestProducts = Product::orderBy('id','desc')->take(6)->get();
        $category = Category::orderBy('id', 'asc')->get();

        $products = Product::orWhere('title', 'like', '%'. $search .'%')->orWhere('description', 'like', '%'. $search .'%')->orWhere('slug', 'like', '%'. $search .'%')->orderBy('id','desc')->paginate(40);
        return view('frontend.pages.search',compact('search','products','pCategories','latestProducts','category'));
    }
}
