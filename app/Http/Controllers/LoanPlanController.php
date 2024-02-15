<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanPlanModel;

class LoanPlanController extends Controller
{
    public function index() {
        $data['getRecord'] = LoanPlanModel::getAllRecord();
        return view("admin.loan_plan.list", $data);
    }

    public function add() {
        return view("admin.loan_plan.add");
    }

    public function store(Request $request) {
        // dd($request->all()); 
        $save = new LoanPlanModel;
        $save->months = trim($request->months);  
        $save->interest_percentage = trim($request->interest_percentage);  
        $save->penalty_rate = trim($request->penalty_rate);  
        $save->save();
        
        return redirect("admin/loan_plan/list")->with("success","Loan Plan Successfully Created");
    }

    public function edit($id, Request $request) {
        $data['getRecord'] = LoanPlanModel::getSingle($id);
        return view("admin.loan_plan.edit", $data);
    }
    
    public function update_post($id, Request $request) {
        // dd($request->all());
        $save = LoanPlanModel::getSingle($id);
        $save->months = trim($request->months);  
        $save->interest_percentage = trim($request->interest_percentage);  
        $save->penalty_rate = trim($request->penalty_rate);  
        $save->save();
        
        return redirect("admin/loan_plan/list")->with("success","Loan Plan Successfully Updated");
    }
        
    public function delete_post($id) {
        $DeleteRecord = LoanPlanModel::getSingle($id);
        $DeleteRecord->delete();

        return redirect()->back()->with('success','Record Successfully Deleted.');
    }
    
}