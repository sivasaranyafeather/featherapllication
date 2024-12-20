<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CollegeController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\FaculityController;


// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', function(){
    return redirect()->route('login');
});

//login routes
Route::get('login',[AuthController::class, 'index'])->name('login');
Route::post('post-login', [AuthController::class, 'postLogin'])->name('login.post');



//register
Route::get('/register', [AuthController::class, 'registration'])->name('register');
Route::post('/post-registration', [AuthController::class, 'postRegistration'])->name('register.post');
Route::get('/dashboard', [AuthController::class, 'dashboard'])->name('dashboard');


//user
 Route::get('/all_user', [UserController::class, 'all_user'])->name('all_user');
 Route::get('/user_labour/{id}', [AuthController::class, 'destroy'])->name('user.delete');
// User AJAX Data
Route::get('data-all-user', [UserController::class, 'data_all_user'])->name('data_all_user');
// User Activate or Deactivate Routes
Route::get('/active_status/{id}/{value}', [AuthController::class, 'active_status'])->name('active_status');
//edit user
Route::get('/edit_user/{id}', [UserController::class, 'edit_user'])->name('edit_user');
// Update User Details
Route::post('/update', [AuthController::class, 'update'])->name('update');

//college
Route::get('/index_college', [CollegeController::class, 'index'])->name('index_college');
Route::post('/college/store', [CollegeController::class, 'store'])->name('college.store');
Route::get('/edit_college/{id}', [CollegeController::class, 'edit'])->name('edit.college');
Route::post('/update_college', [CollegeController::class, 'update'])->name('college.update');
Route::get('/delete_college/{id}', [CollegeController::class, 'destroy'])->name('delete_college');

// college AJAX Data
Route::get('/data-all-college', [CollegeController::class, 'data_all_college'])->name('data_all_college');
//department
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments');
// Route::post('/store', [DepartmentController::class, 'store'])->name('department.store');
Route::post('/departments/store', [DepartmentController::class, 'store'])->name('dep.store');

Route::get('/edit_department/{id}', [DepartmentController::class, 'edit'])->name('edit.department');
Route::post('/update_department', [DepartmentController::class, 'update'])->name('department.update');
Route::get('/delete_department/{id}', [DepartmentController::class, 'destroy'])->name('delete_department');
// department AJAX Data
Route::get('/data-all-department', [DepartmentController::class, 'data_all_department'])->name('data_all_department');

//RegistrationController
Route::get('/index_registration', [RegistrationController::class, 'index'])->name('index_registration');
Route::post('/register/store', [RegistrationController::class, 'store'])->name('register.store');



//faculity details
Route::get('/index_faculity', [FaculityController::class, 'index'])->name('index_faculity');
Route::post('/store',[FaculityController::class,'store'])->name('faculity.store');
Route::get('/edit_faculity/{id}', [FaculityController::class, 'edit'])->name('edit.faculity');
Route::post('/update_faculity', [FaculityController::class, 'update'])->name('faculity.update');
Route::get('/delete_faculity/{id}', [FaculityController::class, 'destroy'])->name('delete_faculity');
// faculity AJAX Data
Route::get('/data-all-faculity', [FaculityController::class, 'data_all_faculity'])->name('data_all_faculity');



