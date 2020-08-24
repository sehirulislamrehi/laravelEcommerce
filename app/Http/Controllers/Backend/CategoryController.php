<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Category;
use App\Models\Backend\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Image;
use File;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'asc')->get();
        return view('backend.pages.category.manage', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parent_category = Category::orderBy('id','asc')->where('parent_id',0)->get();
        return view('backend.pages.category.create',compact('parent_category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Form Validation
        $request->validate(
            [
                'cat_name' => 'required|max:255',
            ],
            [
                'cat_name.required' => 'Please insert a category name',
            ]
        );

        //store a category in database
        $category = new Category();
        $category->name             = $request->cat_name;
        $category->slug             = Str::slug($request->cat_name);
        $category->description      = $request->cat_description;
        $category->parent_id        = $request->parent_id;

        if( $request->image ){
            $image    = $request->file('image');
            $img      = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        } 

        $category->save();

        //write flash message
        $request->session()->flash('message', ' ' . $category->name . ' Category added');  
        
        
        
        return redirect()->route('manageCategory')->with('message', ' ' . $category->name . ' Category added');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        $category = Category::orderBy('id', 'asc')->get();
        return view('frontend.pages.shop', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category, $id)
    {
        $parent_category = Category::orderBy('name','asc')->where("parent_id",0)->get();
        $category = Category::find($id);

        if( !is_null($category) ){
            return view('backend.pages.category.edit',compact('category','parent_category'));
        }
        else{
            return route('manageCategory');
        }
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category, $id)
    {
        //Form validation start
        $request->validate(
            [
                'cat_name' => 'required|max:255',
            ],
            [
                'cat_name.required' => 'Please insert  category name',
            ]
        );
        //Form validation end

        //update form data start
        $category = Category::find($id);

        $category->name             = $request->cat_name;
        $category->slug             = Str::slug($request->cat_name);
        $category->description      = $request->cat_description;
        $category->parent_id        = $request->parent_id;

        if( $request->image ){

            //delete existing image
            if( File::exists('images/category/' . $category->image) ){
                File::delete('images/category/' . $category->image);
            }

            //upload new image
            $image    = $request->file('image');
            $img      = time() . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/category/' . $img);
            Image::make($image)->save($location);
            $category->image = $img;
        }
        $category->save();
        return redirect()->route('manageCategory')->with('update', ' ' . $category->name . ' Category Updated Successfully');

        //update form data end
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category, $id)
    {
        $category = Category::find($id);
        if( !is_null($category) ){

            //if delete parent category. all the sub category also deleted.
            if( $category->parent_id == 0 ){
                $sub_cat = Category::orderBy('id','asc')->where('parent_id',$category->id)->get();
                foreach ($sub_cat as $sub) {
                    if( File::exists('images/category/' . $category->image) ){
                        File::delete('images/category/' . $category->image);
                    }
                    $sub->delete();
                }
            }
            //if delete parent category. all the sub category also deleted.

            //delete product
            $products = Product::where('category_id', $category->id)->get();
            foreach( $products as $product ){
                $product->delete();
            }
            //delete product

            //delete all the sub category and it's image start
            if( File::exists('images/category/' . $category->image) ){
                File::delete('images/category/' . $category->image);
            }
            $category->delete();
            //delete all the sub category and it's image end
        }  
        return redirect()->route('manageCategory')->with('delete', ' ' . $category->name . ' Category Deleted successfully');
    }
}
