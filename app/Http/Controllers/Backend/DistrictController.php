<?php

namespace App\Http\Controllers\Backend;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Backend\Division;
use App\Models\Backend\District;
use Illuminate\Support\Str;

class DistrictController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $districts = District::orderBy('id','asc')->get();
        return view('backend.pages.district.manage', compact('districts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.pages.district.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // validate the division field
        $request->validate(

            [
                'name'          => 'required|max:255',
                'division_id'   => 'required',
            ],
            [
                'name'          => 'Please provide valid division name',
                'division_id'   => 'Please set a division name to show on screen',
            ]

        );

        $district = new District();

        $district->name         = $request->name;
        $district->division_id  = $request->division_id;
        $district->save();

        //flash message
        $request->session()->flash('message', ' '. $district->name  .' District Added Successfully');

        return redirect()->route('manageDistrict');
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
        $district = District::find($id);

        if( !is_null($district) ){
            return view('backend.pages.district.edit', compact('district'));
        }
        else{
            return redirect()->route('manageDistrict');
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
        // validate the division field
        $request->validate(

            [
                'name'          => 'required|max:255',
                'division_id'   => 'required',
            ],
            [
                'name'          => 'Please provide valid division name',
                'division_id'   => 'Please set a division name to show on screen',
            ]

        );

        $district = District::find($id);

        $district->name         = $request->name;
        $district->division_id  = $request->division_id;
        $district->save();

        //flash message
        $request->session()->flash('update', ' '. $district->name  .' District Update Successfully');

        return redirect()->route('manageDistrict');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(District $district,$id)
    {
        $district = District::find($id);

        if( !is_null($district) ){
            $district->delete();
        }
        return redirect()->route('manageDistrict')->with('message', ' '. $district->name  .' District Deleted Successfully');
    }
}
