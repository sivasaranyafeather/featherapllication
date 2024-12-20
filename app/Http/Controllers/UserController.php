<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

class UserController extends Controller
{
    public function all_user()
    {
        $active = 'list_user';
        return view('user.user')->with(compact('active'));
    }

      public function data_all_user(Request $request)
    {
    if ($request->ajax()) {
        $id = Auth::user()->id;
        $result = User::where('id', '!=', $id)->get();
        return DataTables::of($result)
          ->editColumn('is_active', function ($request) {
           if ($request->is_active == 0) {
          $request->is_active = 'Disabled';
           } else {
          $request->is_active = 'Active';
          }
           return $request->is_active;
          })
            ->addColumn('action', function ($user) {
                   if ($user->is_active == 0) {
          $status =  ' <a href="/active_status/' . $user->id . '/1" class="btn btn-sm btn-warning"  data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Click to Activate !"><i class="fa fa-ban"></i></a>';
        } elseif ($user->is_active == 1) {
          $status =  ' <a href="/active_status/' . $user->id . '/0" class="btn btn-sm btn-success"   data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Click to Disable !"><i class="fa fa-check"></i></a>';
        }
        return $status . '&nbsp;<a href="/edit_user/' . $user->id . '" data-id="' . $user->id . '" class="changepassword btn btn-primary btn-sm" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Edit !"><i class="fa fa-edit"></i></a>&nbsp;
          <a href="' . route('user.delete', $user->id) . '" class="btn btn-sm btn-danger" title="Delete" onclick="return confirm(\'Are you sure?\')">
            <i class="fa fa-trash"></i>
        </a>
        ';
                
            })
            ->make(true);
        }


        
    }
 public function edit_user($id )
    {
       $active = 'list_user';
       $data = User::find($id);
        return view('auth.edit')->with(compact('data','active'));
    }

}
