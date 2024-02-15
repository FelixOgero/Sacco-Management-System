<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanTypesModel;

class LoanTypesController extends Controller
{
    public function index() {
        $data['getRecord'] = LoanTypesModel::getAllRecord();
        return view ("admin.loan_types.list", $data);
    }
    public function add() {
        return view ("admin.loan_types.add");
    }

    public function store(Request $request) {

        $save = request()->validate([ 
            'type_name'=>'required'
        ]);

        // dd ( $request->type_name);
        $save = new LoanTypesModel;
        $save->type_name = trim($request->type_name);
        $save->description = trim($request->description);
        $save->save();

        return redirect('admin/loan_types/list')->with('success','Loan Type Successfully Created.');
    }

    public function delete_loan_type($id, Request $request) {
        $RecordDelete = LoanTypesModel::getSingle($id);
        $RecordDelete->delete();
        return redirect()->back()->with('success','Record Successfully Deleted.');
    }

    public function edit($id, Request $request) {
        $data['getRecord'] = LoanTypesModel::getSingle($id);
        return view('admin.loan_types.edit', $data);
    }
    
    public function edit_update($id, Request $request) {
        // dd($request->all());
        $save = LoanTypesModel::getSingle($id);
        $save->type_name = trim($request->type_name);
        $save->description = trim($request->description);
        $save->save();

        return redirect('admin/loan_types/list')->with('success','Loan Type Successfully Updated.');
    }
}
