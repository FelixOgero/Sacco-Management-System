<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoanTypesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [AuthController::class,'login']);
Route::post('login_post', [AuthController::class,'login_post']);
Route::get('register', [AuthController::class,'register']);
Route::post('register_post', [AuthController::class,'register_post']);
Route::get('forgot', [AuthController::class,'forgot']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class,'index']);
    Route::get('admin/staff/list', [StaffController::class,'index']);
    Route::get('admin/staff/add', [StaffController::class,'add']);
    Route::post('admin/staff/add', [StaffController::class,'add_store']);
    Route::get('admin/staff/delete/{id}', [StaffController::class,'staff_delete']);
    Route::get('admin/staff/edit/{id}', [StaffController::class,'staff_edit']);
    Route::post('admin/staff/edit/{id}', [StaffController::class,'staff_edit_update']);

    // Loan Type
    Route::get('admin/loan_types/list', [LoanTypesController::class,'index']);
    Route::get('admin/loan_types/add', [LoanTypesController::class,'add']);
    Route::post('admin/loan_types/add', [LoanTypesController::class,'store']);
    Route::get('admin/loan_types/delete/{id}', [LoanTypesController::class,'delete_loan_type']);
});

Route::group(['middleware' => 'staff'], function() {
    Route::get('staff/dashboard', [DashboardController::class,'index']);
});

Route::get('logout', [AuthController::class,'logout']);




