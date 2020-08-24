<?php
//use controller location
namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;

//use modal location
use App\Models\Backend\Brand;

use App\Models\Backend\Product;

use Illuminate\Http\Request;
use Illuminate\Support\Str;

//use image and file
use Image;
use File;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allBrand = Brand::orderBy('id','asc')->get();
        return view('backend.pages.brand.manage',compact('allBrand'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   
        //Form validation start
        $request->validate(
            [
                'brand_name' => 'required|max:255',
            ],
            [
                'brand_description' => 'Please insert a brand name',
            ]
        );
        //Form validation end

        //add brand in start
        $brand              = new Brand();
        $brand->name        = $request->brand_name;
        $brand->slug        = Str::slug($request->brand_name);
        $brand->description = $request->brand_description;

        if( $request->image ){
            $image          = $request->file('image');
            $image_name     = time() . '.' . $image->getClientOriginalExtension();
            $image_location = public_path('images/brand/'. $image_name);
            Image::make($image)->save($image_location);
            $brand->image = $image_name; 
        }
        $brand->save();

        //flash message
        $request->session()->flash('message', ' '. $brand->name  .' Brand Added Successfully');

        return redirect()->route('manageBrand');

        //add brand in end
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
        $brand = Brand::find($id);

        if( !is_null($brand) ){
            return view('backend.pages.brand.edit',compact('brand'));
        }
        else{
            return route('manageBrand');
        }
        
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
        //Form validation start
        $request->validate(
            [
                'brand_name' => 'required|max:255',
            ],
            [
                'brand_description' => 'Please insert a brand name',
            ]
        );
        //Form validation end

        //add brand in start
        $brand              = Brand::find($id);
        $brand->name        = $request->brand_name;
        $brand->slug        = Str::slug($request->brand_name);
        $brand->description = $request->brand_description;

        if( $request->image ){

            //delete previous image
            if( File::exists('images/brand/' . $brand->image) ){
                File::delete('images/brand/' . $brand->image);
            }

            $image          = $request->file('image');
            $image_name     = time() . '.' . $image->getClientOriginalExtension();
            $image_location = public_path('images/brand/'. $image_name);
            Image::make($image)->save($image_location);
            $brand->image = $image_name; 
        }
        $brand->save();

        //flash message
        $request->session()->flash('update', ' '. $brand->name .' Brand Updated Successfully');

        return redirect()->route('manageBrand');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand, $id)
    {
        $brand = Brand::find($id);
        if( !is_null($brand) ){
            $products = Product::where('brand_id', $brand->id)->get();
            foreach( $products as $product ){
                $product->delete();
            }
            $brand->delete();
        }


        return redirect()->route('manageBrand')->with('delete', ' '. $brand->name .'  Brand Deleted Successfully');
    }
}
