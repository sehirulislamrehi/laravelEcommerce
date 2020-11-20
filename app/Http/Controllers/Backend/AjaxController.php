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
            $ajax = Ajax::orderBy('id','desc')->get();
            return DataTables::of($ajax)
            ->rawColumns(['action'])
            ->addColumn('action',function(Ajax $ajax){ 
                return '
                <button type="button" data-content="'.route('ajax.crud.edit', $ajax->id).'" data-target="#editModal" class="btn btn-primary" data-toggle="modal">
                    Edit
               </button>
               <button type="button" data-content="'.route('ajax.crud.delete_modal', $ajax->id).'" data-target="#editModal" class="btn btn-danger" data-toggle="modal">
                    Delete
               </button>';
            })
            ->make(true);
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|unique:ajaxes,name,',
            'email' => 'required|email',
        ]);
        
        $ajaxes = new Ajax();

        $ajaxes->name = $request->name;
        $ajaxes->email = $request->email;

        if($ajaxes->save()):
            return response()->json();
        endif;
    }

    public function edit($id){
        $ajax = Ajax::find($id);
        return view('backend.modals.ajax.edit', compact('ajax'));
    }

    public function delete_modal($id){
        $ajax = Ajax::find($id);
        return view('backend.modals.ajax.delete', compact('ajax'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|unique:ajaxes,name,'.$id,
            'email' => 'required',
        ]);

        $ajax = Ajax::find($id);

        $ajax->name = $request->name;
        $ajax->email = $request->email;

        if($ajax->save()):
            return response()->json();
        endif;
    }

    public function delete($id){
        $ajax = Ajax::find($id);

        if($ajax->delete()):
            return response()->json();
        endif;
    }
}
