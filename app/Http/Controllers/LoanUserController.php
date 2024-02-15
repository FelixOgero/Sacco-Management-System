<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\LoanUserModel;

class LoanUserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {   
        $data['getRecord'] = LoanUserModel::getAllRecord();
        return view("admin.loan_user.index", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("admin.loan_user.create");
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
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
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
}
