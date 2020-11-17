<?php

namespace App\Http\Controllers\Backend;

use App\DataTables\AjaxDataTable;
use App\Http\Controllers\Controller;
use App\Models\Backend\Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class AjaxController extends Controller
{   
    public function index(Request $request){
        $ajax = Ajax::latest()->get();

        if ($request->ajax()):
            return DataTables::make($ajax)
            ->addColumn('action',function(Ajax $ajax){
                return 1;
            })
            ->toJson();
        endif;

        return view('backend.pages.ajax.manage', compact('ajax'));
        
    }

    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:ajaxes,name,',
            'email' => 'required',
        ]);
        
        $ajaxes = new Ajax();

        $ajaxes->name = $request->name;
        $ajaxes->email = $request->email;

        if($ajaxes->save()):
            return response()->json(['ajaxes'=>$ajaxes]);
        endif;
    }
}
