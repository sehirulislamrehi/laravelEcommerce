<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Models\Backend\Ajax;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Response;

class AjaxController extends Controller
{
    public function index(Request $request){
        return view('backend.pages.ajax.manage');
    }

    public function all_data(Request $request){
            $ajax = Ajax::query();
            return DataTables::of($ajax->latest()->get())
            ->rawColumns(['action'])
            ->addColumn('action',function(Ajax $ajax){
                return 1;
            })
            ->make(true);
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
            return response()->json();
        endif;
    }
}
