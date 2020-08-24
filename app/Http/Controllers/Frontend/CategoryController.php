<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    public function show(Category $category)
    { 
        $pCategories = Category::orderBy('id', 'asc')->where('parent_id',0)->get();
        $products = Product::orderBy('id', 'asc')->where('category_id',$category->id)->paginate(15);
        $latestProducts = Product::orderBy('id','desc')->take(6)->get();
        return view('frontend.pages.shop', compact('pCategories','category','products','latestProducts'), ['products' => $products]);
    }

    
}
