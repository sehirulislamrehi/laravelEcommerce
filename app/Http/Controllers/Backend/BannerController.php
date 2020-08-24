<?php

namespace App\Http\Controllers\Backend;

use App\Models\Backend\Banner;
use Illuminate\Support\str;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Image;
use File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners = Banner::orderBy('id', 'desc')->get();
        return view('backend.pages.banner.manage', compact('banners') );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.banner.create');
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
                'title' => 'required',
            ],
            [
                'description' => 'required'
            ],
            [
                'link' => 'required'
            ],
            [
                'image' => 'required'
            ],
        );

        $banner = new Banner();

        $banner->title          = $request->title;
        $banner->slug           = Str::slug($request->title);
        $banner->link           = $request->link;
        $banner->description    = $request->description;

        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/banner/' . $img);
            Image::make($image)->save($location);
            $banner->image = $img;
        }

        $banner->save();

        //flash message
        $request->session()->flash('create', ' '. $banner->title .' Banner Added Successfully ' );
        return redirect()->route('manageBanner');

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
    public function edit(Banner $banner)
    {
        return view('backend.pages.banner.edit', compact('banner') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $request->validate(
            [
                'title' => 'required',
            ],
            [
                'description' => 'required'
            ],
            [
                'link' => 'required'
            ],
            [
                'image' => 'required'
            ],
        );

        $banner->title          = $request->title;
        $banner->slug           = Str::slug($request->title);
        $banner->link           = $request->link;
        $banner->description    = $request->description;

        if( $request->image ){

            if( File::exists('images/banner/' . $banner->image) ){
                File::delete('images/banner/' . $banner->image);
            }

            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/banner/' . $img);
            Image::make($image)->save($location);
            $banner->image = $img;
        }

        $banner->save();

        //flash message
        $request->session()->flash('update', ' '. $banner->title .' Banner Updated Successfully ' );
        return redirect()->route('manageBanner');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner, Request $request)
    {
        if( !is_null($banner) ){
            if( File::exists('images/banner/' . $banner->image) ){
                File::delete('images/banner/' . $banner->image);
            }
            $banner->delete();
        }
        //flash message
        $request->session()->flash('delete', ' '. $banner->title .' Banner Deleted Successfully ' );
        return redirect()->route('manageBanner');
    }
}
