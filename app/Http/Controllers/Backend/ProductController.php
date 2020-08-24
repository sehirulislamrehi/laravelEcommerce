<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Brand;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use App\Models\Backend\ProductImage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('id','asc')->get();
        return view('backend.pages.product.manage', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'product_title'         => 'required|max:255',
                'product_description'   => 'required|max:1000',
                'r_price'               => 'required|numeric',
                'status'                => 'required|numeric',
                'brand_id'              => 'required|numeric',
                'category_id'           => 'required|numeric',
                
            ]);

        $product =  new Product;

        $product->title             = $request->product_title;
        $product->slug              = Str::slug($request->product_title);
        $product->description       = $request->product_description;
        $product->regular_price     = $request->r_price;
        $product->offer_price       = $request->o_price;
        $product->quantity          = $request->quantity;
        $product->status            = $request->status;
        $product->is_featured       = $request->feature;
        $product->category_id       = $request->category_id;
        $product->brand_id          = $request->brand_id;
        $product->save();

        //flash message
        $request->session()->flash('message', ' '. $product->title .' Product Added Successfully');

        if( count($request->p_image) > 0 ){
                
            foreach ($request->p_image as $image) {
                $img      =  time() .uniqid(). '__.' . $image->getClientOriginalExtension();
                $location = public_path('images/products/' . $img);
                Image::make($image)->save($location);

                $p_image  = new ProductImage;

                $p_image->product_id    = $product->id;
                $p_image->image         = $img;
                $p_image->save();
            }

            
            
        }
        return redirect()->route('manageProduct');

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
    public function edit(Product $product)
    {   

        return view('backend.pages.product.edit',compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,Product $product)
    {
        $request->validate(
            [
                'product_title'         => 'required|max:255',
                'product_description'   => 'required|max:1000',
                'r_price'               => 'required|numeric',
                'status'                => 'required|numeric',
                'brand_id'              => 'required|numeric',
                'category_id'           => 'required|numeric',
            ]);

        // $AllDataImage = $id->images;


        // $ChangedImage = [];

        // $ChangedImage[0] = $request->p_image;
        // $ChangedImage[1] = $request->p1_image;
        // $ChangedImage[2] = $request->p2_image;
        // $ChangedImage[3] = $request->p3_image;
        // $ChangedImage[4] = $request->p4_image;

        // foreach($ChangedImage as $key => $image){
        //     if($image){
        //         echo $AllDataImage[$key]->image;
        //         if(File::exists('images/products/'.$AllDataImage[$key]->image)){
        //             File::delete('images/products/'.$AllDataImage[$key]->image);

        //         }

        //         $newImageName = time() .uniqid(). '__.jpg';
        //         Image::make($image)->encode('jpg', 100)->save(public_path('images\\products\\'.$newImageName));
        //         $AllDataImage[$key]->image = $newImageName;
        //         $id->images()->save($AllDataImage[$key]);

        //     }
        // }

        $product->title             = $request->product_title;
        $product->slug              = Str::slug($request->product_title);
        $product->description       = $request->product_description;
        $product->regular_price     = $request->r_price;
        $product->offer_price       = $request->o_price;
        $product->quantity          = $request->quantity;
        $product->status            = $request->status;
        $product->is_featured       = $request->feature;
        $product->category_id       = $request->category_id;
        $product->brand_id          = $request->brand_id;
        $product->save();

        //flash message
        $request->session()->flash('update', ' '. $product->title .' Product Updated Successfully');

        return redirect()->route('manageProduct');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {

        foreach ($product->images as $image) {
            if( File::exists('images/products/' . $image->image ) ){
                File::delete('images/products/' . $image->image );
            }
        }
        

        if( !is_null($product) ){
            $product->images()->delete();
            $product->delete();
        }
        return redirect()->route('manageProduct')->with('delete', ' '. $product->title .' Product Deleted Successfully');
                        
    }
}
