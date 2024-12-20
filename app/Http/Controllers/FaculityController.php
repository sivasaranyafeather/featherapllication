<?php

namespace App\Http\Controllers;

use App\Models\Faculity;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;


class FaculityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active='faculity';
        
        return view('faculity.index')->with(compact('active'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */


     public function data_all_faculity(Request $request)
{
    if ($request->ajax()) {
        $result = Faculity::query(); 

        return DataTables::of($result)
            ->addColumn('action', function ($result) {
                return '
                  
                <a href="javascript:void(0)" data-id="' . $result->id . '" class="showfaculity btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:void(0)" data-id="' . $result->id . '" class="deletefaculity btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!">
                        <i class="fa fa-trash"></i>
                    </a>

                    &nbsp;';
            })
            ->make(true);
    }
}

    public function store(Request $request)
    {
     
        $request->validate([
      'name'     => 'required',
      ]);
 
    $data  = $request->all();
    Faculity::create([
        'name'   => $data['name'],
    
    ]);

    Session::flash('successmessage', "Faculity Added Successfully !");
    return redirect()->back();
    

    }

    /**
     * Display the specified resource.
     */
    public function show(Faculity $faculity)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $data = Faculity::find($id);
      return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    
    public function update(Request $request, Faculity $faculity)
    {
     $validatedData = $request->validate([
      'edit_name' => 'required|string|max:255'
    ]);

    $data = Faculity::find($request->edit_id);
   
    $data->name = $request->edit_name;
    $data->save();

    Session::flash('successmessage', "Faculity Name Updated Successfully!");
    
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */

    public function destroy($id)
    {
     Faculity::find($id)->delete(); 
     Session::flash('infomessage', "Faculity Deleted Successfully");
     return response()->json(['success' => 'Faculity Deleted Successfully.']);
    }

}
