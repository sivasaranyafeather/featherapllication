<?php

namespace App\Http\Controllers\auth;


use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('auth.login');
    }
/**
   * Write code on Method
   *
   * @return response()
   */
  public function postLogin(Request $request): RedirectResponse
{
  
    $request->validate([
        'email'    => 'required',
        'password' => 'required',
    ]);

    $credentials = $request->only('email', 'password');
    if (Auth::attempt($credentials)) {
        Session::flash('successmessage', "Logged In Successfully");
        return redirect()->route('dashboard');
    }
     Session::flash('errormessage', "Oops! You have entered invalid credentials");
     return redirect("login");
}

   public function dashboard()
  {
   
    if (Auth::check()) {
      $active  = 'dashboard';
      
      return view('control.dashboard')->with(compact('active'));
    }
    Session::flash('errormessage', "Opps! You do not have Access. Login to Gain Access");
    return redirect("login");
  }


/**
   * Write code on Method
   *
   * @return response()
   */
  public function registration(): View
  {
    $active = "newuser";
    return view('auth.register')->with(compact('active'));
  }

     public function postRegistration(Request $request): RedirectResponse
  {
    $request->validate([
      'name'     => 'required',
      'email'    => 'required|email|unique:users',
      'password' => 'required|min:8',
    ]);

    $data  = $request->all();
    $check = $this->create($data);

    Session::flash('successmessage', "New User Added Successfully !");
    return redirect()->back();
  }
/**
   * Write code on Method
   *
   * @return response()
   */
  public function create(array $data)
  {
    return User::create([
      'name'             => $data['name'],
      'email'            => $data['email'],

      'password'         => Hash::make($data['password']),
      'role'             => $data['role'],
      'is_active'        => $data['is_active'],
    
    ]);
  }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

/**
     * Display the specified resource.
     */
    public function show(Auth $auth)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Auth $auth)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
      'name'     => 'required',
      // 'password' => 'required|min:8',
    ]);

    if ($validator->fails()) {
      Session::flash('errormessage', $validator->errors());
      return redirect()->back();
    }

    $data                   = User::find($request->id);
    $data->name             = $request->name;
    $data->email            = $request->email;
    // $data->current_password = $request->current_password;
    $data->password         = Hash::make($request->password);
    $data->role             = $request->role;
    $data->is_active        = $request->is_active;
    $data->save();

    Session::flash('successmessage', "User Details Updated Successfully !");
    return redirect()->back();
    }

     public function active_status($id, $value)
  {
    $data            = User::find($id);
    $data->is_active = $value;
    $data->save();

    Session::flash('successmessage', "User Active status Updated Successfully");
    return back();
  }
    /**
     * Remove the specified resource from storage.
     */
     public function destroy($id)
    {
    $data = User::destroy($id);
    
    Session::flash('infomessage', "User Deleted Successfully");
    return redirect()->back();
    }
}
    