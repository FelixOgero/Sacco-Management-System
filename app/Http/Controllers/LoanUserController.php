<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanUserModel;
use App\Models\LoanModel;
use Illuminate\Support\Facades\Auth;

class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['getRecord'] = LoanUserModel::getAllRecord();
        $data['meta_title'] = 'Loan User List';
        return view("admin.loan_user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['meta_title'] = 'Add Loan User';
        return view("admin.loan_user.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // $checkEmail = LoanUserModel::where("email", "=", $request->email)->first();

        // if ($checkEmail) {

        //     return redirect("admin/loan_user/list")->with("error","Loan User Email Already Exists");

        // } else {}

            $save = request()->validate([ 
                'first_name'=>'required',
                'middle_name' => 'required',
                'last_name' => 'required',
                'address' => 'required',
                'contact' => 'required',
                'email'=> 'required|unique:loan_user',
                'tax_id' => 'required|unique:loan_user',
            ]);
    
            $save = new LoanUserModel;
            $save->first_name = trim($request->first_name);
            $save->middle_name = trim($request->middle_name);
            $save->last_name = trim($request->last_name);
            $save->address = trim($request->address);
            $save->contact = trim($request->contact);
            $save->email = trim($request->email);
            $save->tax_id = trim($request->tax_id);
            $save->save();

            return redirect("admin/loan_user/list")->with("success","Loan User Successfully added");
         
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
    public function edit($id)
    {
        // echo $id; die();
        $data['getRecord'] = LoanUserModel::getSingle($id);
        $data['meta_title'] = 'Edit Loan User';
        return view('admin.loan_user.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // dd($request->all());
        $save = LoanUserModel::getSingle($id);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->address = trim($request->address);
        $save->contact = trim($request->contact);
        $save->email = trim($request->email);
        $save->tax_id = trim($request->tax_id);
        $save->save();

        return redirect("admin/loan_user/list")->with("success","Loan User Successfully Updated");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $RecordDelete = LoanUserModel::getSingle($id);
        $RecordDelete->delete();

        return redirect()->back()->with("success","Record Successfully Deleted");
    }

    public function staff_loan_user(Request $request){

        $data['getRecord'] = LoanModel::getLoanStaff(Auth::user()->id);
        $data['meta_title'] = 'Loan User List';

        return view("admin.admin_staff.staff_loan_user", $data);
    }

    public function loan_user_delete($id){
        $RecordDelete = LoanModel::find($id);
        $RecordDelete->delete();
        return redirect()->back()->with("success","Record Successfully Deleted");
    }
}
