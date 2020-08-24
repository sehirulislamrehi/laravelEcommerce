<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Visitor;
use Image;
use File;

class VisitorProfileController extends Controller
{

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Visitor $visitor)
    {
        return view('frontend.pages.editmyaccount', compact('visitor') );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Visitor $visitor)
    {
        $request->validate(
            [
                'name' => 'required',
            ],
            [
                'email' => 'required',
            ],
            [
                'image' => 'required',
            ]
        );

        $visitor->name              = $request->name;
        $visitor->email             = $request->email;
        $visitor->phone             = $request->phone;
        $visitor->shipping_address  = $request->shipping_address;
        $visitor->gender            = $request->gender;

        if( $request->image ){

            if( File::exists('images/visitor/' . $visitor->image ) ){
                File::delete('images/visitor/' . $visitor->image );
            }

            $image = $request->file('image');
            $img = rand(0,10000) . '.' . $image->getClientOriginalExtension();
            $location = public_path('images/visitors/' . $img );
            Image::make($image)->save($location);
            $visitor->image = $img;
        }

        $visitor->save();

        $request->session()->flash('update', 'Profile updated successfully');
        return redirect()->route('account');
    }

    
}
