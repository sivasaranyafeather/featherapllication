<?php

namespace App\Http\Controllers;

use App\Models\Registration;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use App\Models\User;
use App\Models\College;
use App\Models\Department;
use Carbon\Carbon;

class RegistrationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $active='registration';
        $college= College::get();
        $department=Department::get();
        return view('registration.index')->with(compact('active','college','department'));
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
    'name' => 'required',
]);

$data = $request->all();


$date_of_birth = \Carbon\Carbon::createFromFormat('Y-m-d', $data['date_of_birth'])->format('Y-m-d');
$date_of_joining = \Carbon\Carbon::createFromFormat('Y-m-d', $data['date_of_joining'])->format('Y-m-d');


$lastRegister = Registration::latest('reg_no')->first();
$lastNumber = $lastRegister ? intval(substr($lastRegister->reg_no, 4)) : 0;
$newRegisterNumber = $lastNumber + 1;
$formattedRegisterNumber = str_pad($newRegisterNumber, 3, '0', STR_PAD_LEFT);

$reg_no = 'FEAC' . $formattedRegisterNumber;


Registration::create([
    'reg_no' => $reg_no, 
    'working_type' => $data['working_type'],
    'name_domain' => $data['name_domain'],
    'name' => $data['name'],
    'date_of_birth' => $date_of_birth,
    'mobile' => $data['mobile'],
    'mail' => $data['mail'],
    'working_status' => $data['working_status'],
    'parents_contact' => $data['parents_contact'],
    'branch' => $data['branch'],
    'address' => $data['address'],
    'reason' => $data['reason'],
    'college_id' => $data['college'],
    'department_id' => $data['department'],
    'year' => $data['year'],
    'date_of_joining' => $date_of_joining,
    'intern_days' => $data['intern_days'],
    'lead_source' => $data['lead_source'],
]);

Session::flash('successmessage', "Register details added successfully!");
return redirect()->back();

}


    /**
     * Display the specified resource.
     */
    public function show(Registration $registration)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Registration $registration)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Registration $registration)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Registration $registration)
    {
        //
    }
}
