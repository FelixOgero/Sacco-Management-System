<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\SavingsController;
use App\Http\Controllers\LoanPlanController;
use App\Http\Controllers\LoanUserController;
use App\Http\Controllers\PaymentsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DividendsController;
use App\Http\Controllers\LoanTypesController;
use App\Http\Controllers\WithdrawalsController;

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
Route::post('forgot/post', [AuthController::class,'forgot_post']);
Route::get('terms', [AuthController::class,'terms']);

Route::group(['middleware' => 'admin'], function() {
    Route::get('admin/dashboard', [DashboardController::class,'index']);
    Route::get('admin/staff/list', [StaffController::class,'index']);
    Route::get('admin/staff/add', [StaffController::class,'add']);
    Route::post('admin/staff/add', [StaffController::class,'add_store']);
    Route::get('admin/staff/delete/{id}', [StaffController::class,'staff_delete']);
    Route::get('admin/staff/edit/{id}', [StaffController::class,'staff_edit']);
    Route::post('admin/staff/edit/{id}', [StaffController::class,'staff_edit_update']);
    Route::get('admin/staff/view/{id}', [StaffController::class,'staff_view']);

    // Loan Type
    Route::get('admin/loan_types/list', [LoanTypesController::class,'index']);
    Route::get('admin/loan_types/add', [LoanTypesController::class,'add']);
    Route::post('admin/loan_types/add', [LoanTypesController::class,'store']);
    Route::get('admin/loan_types/delete/{id}', [LoanTypesController::class,'delete_loan_type']);
    Route::get('admin/loan_types/edit/{id}', [LoanTypesController::class,'edit']);
    Route::post('admin/loan_types/edit/{id}', [LoanTypesController::class,'edit_update']);

    //Loan Plan
    Route::get('admin/loan_plan/list', [LoanPlanController::class,'index']);
    Route::get('admin/loan_plan/add', [LoanPlanController::class,'add']);
    Route::post('admin/loan_plan/add', [LoanPlanController::class,'store']);
    Route::get('admin/loan_plan/edit/{id}', [LoanPlanController::class,'edit']);
    Route::post('admin/loan_plan/edit/{id}', [LoanPlanController::class,'update_post']);
    Route::get('admin/loan_plan/delete/{id}', [LoanPlanController::class,'delete_post']);

    //Loan Menu
    Route::get('admin/loan/list', [LoanController::class,'index']);
    Route::get('admin/loan/add', [LoanController::class,'create']);
    Route::post('admin/loan/add', [LoanController::class,'store']);
    Route::get('admin/loan/delete/{id}', [LoanController::class,'destroy']);
    Route::get('admin/loan/edit/{id}', [LoanController::class,'edit']);
    Route::post('admin/loan/edit/{id}', [LoanController::class,'update']);

    //Loan User
    Route::get('admin/loan_user/list', [LoanUserController::class,'index']);
    Route::get('admin/loan_user/add', [LoanUserController::class,'create']);
    Route::post('admin/loan_user/add', [LoanUserController::class,'store']);
    Route::get('admin/loan_user/delete/{id}', [LoanUserController::class,'destroy']);
    Route::get('admin/loan_user/edit/{id}', [LoanUserController::class,'edit']);
    Route::post('admin/loan_user/edit/{id}', [LoanUserController::class,'update']);

    //Savings
    Route::get('admin/savings/list', [SavingsController::class,'index']);
    Route::get('admin/savings/add', [SavingsController::class,'create']);
    Route::post('admin/savings/add', [SavingsController::class,'store']);
    Route::get('admin/savings/delete/{id}', [SavingsController::class,'destroy']);
    Route::get('admin/savings/edit/{id}', [SavingsController::class,'edit']);
    Route::post('admin/savings/edit/{id}', [SavingsController::class,'update']);

    //Withdrawals
    Route::get('admin/withdrawals/list', [WithdrawalsController::class,'index']);
    Route::get('admin/withdrawals/export', [WithdrawalsController::class, 'export']);
    Route::get('admin/withdrawals/add', [WithdrawalsController::class,'create']);
    Route::post('admin/withdrawals/add', [WithdrawalsController::class,'store']);
    Route::get('admin/withdrawals/delete/{id}', [WithdrawalsController::class,'destroy']);
    Route::get('admin/withdrawals/edit/{id}', [WithdrawalsController::class,'edit']);
    Route::post('admin/withdrawals/edit/{id}', [WithdrawalsController::class,'update']);

    //Dividends
    Route::get('admin/dividends/list', [DividendsController::class,'index']);
    Route::get('admin/dividends/add', [DividendsController::class,'create']);
    Route::post('admin/dividends/add', [DividendsController::class,'store']);
    Route::get('admin/dividends/delete/{id}', [DividendsController::class,'destroy']);
    Route::get('admin/dividends/edit/{id}', [DividendsController::class,'edit']);
    Route::post('admin/dividends/edit/{id}', [DividendsController::class,'update']);

    //Payments
     Route::get('admin/payments/list', [PaymentsController::class,'index']);
     Route::get('admin/payments/add', [PaymentsController::class,'create']);
     Route::post('admin/payments/add', [PaymentsController::class,'store']);
     Route::get('admin/payments/delete/{id}', [PaymentsController::class,'destroy']);
     Route::get('admin/payments/edit/{id}', [PaymentsController::class,'edit']);
     Route::post('admin/payments/edit/{id}', [PaymentsController::class,'update']);

    //Profile
    Route::get('admin/profile', [DashboardController::class,'profile']);
    Route::post('admin/profile/update', [DashboardController::class,'profile_update']);

    // Logo
    Route::get('admin/logo', [DashboardController::class,'website_logo']);
    Route::post('admin/logo_update', [DashboardController::class,'logo_update']);
});

Route::group(['middleware' => 'staff'], function() {
    Route::get('staff/dashboard', [DashboardController::class,'index']);

    //Loan User
    Route::get('staff/loan_user/list', [LoanUserController::class,'staff_loan_user']);
    Route::get('staff/loan_user/delete/{id}', [LoanUserController::class,'loan_user_delete']);

    Route::get('staff/profile', [DashboardController::class,'staff_profile']);
    Route::post('staff/profile_update', [DashboardController::class,'staff_profile_update']);
    
});

Route::get('logout', [AuthController::class,'logout']);




