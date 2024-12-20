<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use Carbon\Carbon;

class DepartmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
    $active = "department";
    return view('department.index')->with(compact('active'));
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
    public function store(Request $request)
    {
        $request->validate([
      'name'     => 'required',
      ]);
 
    $data  = $request->all();
    Department::create([
        'name'   => $data['name'],
    
    ]);

    Session::flash('successmessage', "DepartmentName Added Successfully !");
    return redirect()->back();
    }


public function data_all_department(Request $request)
{
    if ($request->ajax()) {
        $result = Department::query(); 

        return DataTables::of($result)
            ->addColumn('action', function ($result) {
                return '
                    <a href="javascript:void(0)" data-id="' . $result->id . '" class="showdepartment btn btn-primary" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit!">
                        <i class="fa fa-edit"></i>
                    </a>
                    &nbsp;
                    <a href="javascript:void(0)" data-id="' . $result->id . '" class="deletedepartment btn btn-danger" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Delete!">
                        <i class="fa fa-trash"></i>
                    </a>




                    
                    &nbsp;';
            })
            ->make(true);
    }
}

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
      $data = Department::find($id);
      return response()->json($data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
    $validatedData = $request->validate([
      'edit_name' => 'required|string|max:255'
    ]);

    $data = Department::find($request->edit_id);
    
    // Update college details
    $data->name = $request->edit_name;
    $data->save();

    // Flash success message and redirect
    Session::flash('successmessage', "Department Name Updated Successfully!");
    return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
    Department::find($id)->delete(); 
    Session::flash('infomessage', "Department Deleted Successfully");
    return response()->json(['success' => 'Department Deleted Successfully.']);
    }
}
