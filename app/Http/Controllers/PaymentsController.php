<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\LoanModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LoanPlanModel;
use App\Models\LoanUserModel;
use App\Models\PaymentsModel;
use App\Models\LoanTypesModel;

class PaymentsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = PaymentsModel::getAllRecord();
        $data['meta_title'] = 'Payments List';
        return view('admin.payments.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['getStaff'] = User::where('is_role','=','0')->where('is_delete', '=','0')->get();
        $data['getLoanUser'] = LoanUserModel::get();
        $data['getLoanTypes'] = LoanTypesModel::get();
        $data['getLoanPlan'] = LoanPlanModel::get();
        $data['meta_title'] = 'Add Payment';
        return view('admin.payments.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //  dd($request->all());
         $save = new PaymentsModel;
         $save->user_national_id = trim($request->user_national_id);
         $save->user_tax_id = trim($request->user_tax_id);
         $save->user_id = trim($request->user_id);
         $save->staff_id = trim($request->staff_id);
         $save->loan_types_id = trim($request->loan_types_id);
         $save->loan_plan_id = trim($request->loan_plan_id);
         $save->loan_amount = trim($request->loan_amount);
         $save->loan_amount_paid = trim($request->loan_amount_paid);
         $save->loan_amount_remaining = trim($request->loan_amount_remaining);

         // Generate a unique reference number (UUID)
         $save->reference_number = Str::uuid()->toString();

         $save->purpose = trim($request->purpose);
         
         $save->save();
 
         return redirect("admin/payments/list")->with("success","Payment Successfully Added");
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request, $id)
    {
        $data['getStaff'] = User::where('is_role','=','0')->where('is_delete', '=','0')->get();
        $data['getLoanUser'] = LoanUserModel::get();
        $data['getLoanTypes'] = LoanTypesModel::get();
        $data['getLoanPlan'] = LoanPlanModel::get();
        // $data['getRecord'] = LoanModel::getSingle($id);
        $data['getRecord'] = PaymentsModel::getSingle($id);
        $data['meta_title'] = 'Edit Payment';
        return view("admin.payments.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $save = PaymentsModel::getSingle($id);
        $save->user_id = trim($request->user_id);
        $save->staff_id = trim($request->staff_id);
        $save->loan_types_id = trim($request->loan_types_id);
        $save->loan_plan_id = trim($request->loan_plan_id);
        $save->loan_amount = trim($request->loan_amount);
        $save->loan_amount_paid = trim($request->loan_amount_paid);
        $save->loan_amount_remaining = trim($request->loan_amount_remaining);
        // Generate a unique reference number (UUID)
        $save->reference_number = Str::uuid()->toString();
        $save->purpose = trim($request->purpose);
        $save->save();

        return redirect("admin/payments/list")->with("success","Payment Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $DeleteRecord = PaymentsModel::getSingle($id);
        $DeleteRecord->delete();

        return redirect()->back()->with("success","Record Successfully Deleted.");
    }
}
