<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use Illuminate\Support\Str;
use App\Models\Backend\Category;
use Image;
use File;

class ProductController extends Controller
{
   
    public function index()
    {
        $products = Product::orderBy('id','asc')->get();
        return view('frontend.pages.index', compact('products'));
    }

    public function show($slug)
    {   
        $product = Product::where('slug', $slug)->first();
        $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
        $latestProducts = Product::orderBy('id','desc')->take(6)->get();
        $relatedProducts = Product::orderBy('id','asc')->where('category_id',$product->category_id)->get();

        if( !is_null($product) ){
            return view('frontend.pages.product', compact('product', 'pCategories','latestProducts','relatedProducts'));
        }
        else{
            return view('frontend.pages.index');
        }
        
    }


   
}
