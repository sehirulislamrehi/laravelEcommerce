<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Ad;
use Illuminate\Support\str;
use Image;
use File;

class AdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ads = Ad::orderBy('id','asc')->get();
        return view('backend.pages.ad.ad', compact('ads'));
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
        $request->validate(
            [
            'title' => 'required',
            'description' => 'required'
            ]);
        $ad = new Ad();
        $ad->title          = $request->title;
        $ad->slug           = Str::slug($request->title);
        $ad->description    = $request->description;
        if( $request->image ){
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/ad/' . $img);
            Image::make($image)->save($location);
            $ad->image = $img;
        }
        $ad->save();

        return Response()->json(
                $ad
            , 200);
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
        $ad = Ad::find($id);
        if( !is_null($ad) ){
            return response()->json($ad,200);
        }else{
            return response()->json("Item not found");
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $id)
    {
        $request->validate(
            [
            'title' => 'required',
            'description' => 'required'
            ],
        );
        $ad = Ad::find($id);
        $ad->title          = $request->title;
        $ad->slug           = Str::slug($request->title);
        $ad->description    = $request->description;
        if( $request->image ){
            if( File::exists('images/ad/'. $ad->image) ){
                File::delete('images/ad/'. $ad->image);
            }
            $image  = $request->file('image');
            $img    = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/ad/' . $img);
            Image::make($image)->save($location);
            $ad->image = $img;
        }
        $ad->save();

        return response()->json($ad, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $ad = Ad::find($id);
        if( File::exists('images/ad/'. $ad->image) ){
            File::delete('images/ad/'. $ad->image);
        }
        $ad->delete();
        return response()->json('Advertisement Deleted',200);
    }
}
