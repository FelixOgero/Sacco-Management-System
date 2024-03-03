<?php

namespace App\Http\Controllers;

use App\Models\SavingsModel;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Excel;
use App\Models\WithdrawalsModel;
// use Maatwebsite\Excel\Facades\Excel;

class SavingsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['getRecord'] = SavingsModel::getAllRecord();
        $data['meta_title'] = 'Loan Savings List';
        return view("admin.savings.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['meta_title'] = 'Add Loan Saving';
        return view("admin.savings.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        
        $save = request()->validate([
            'id_number'=>'required|unique:savings',
            'first_name'=>'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'address' => 'required',
            'contact' => 'required',
            'email'=> 'required|unique:savings',
            'tax_id' => 'required|unique:savings',
            'amount' => 'required',
        ]);

        $save = new SavingsModel;
        $save->id_number = trim($request->id_number);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->address = trim($request->address);
        $save->contact = trim($request->contact);
        $save->email = trim($request->email);
        $save->tax_id = trim($request->tax_id);
        $save->amount = trim($request->amount);
        $save->save();

        return redirect("admin/savings/list")->with("success","Loan Saving Successfully added");
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
        $data['getRecord'] = SavingsModel::getSingle($id);
        $data['meta_title'] = 'Edit Loan Saving';
        return view('admin.savings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $save = SavingsModel::getSingle($id);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->address = trim($request->address);
        $save->contact = trim($request->contact);
        $save->email = trim($request->email);
        $save->amount = trim($request->amount);
        $save->save();

        return redirect("admin/savings/list")->with("success","Loan Saving Successfully Updated");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $RecordDelete = SavingsModel::getSingle($id);
        $RecordDelete->delete();

        return redirect()->back()->with("success","Record Successfully Deleted");
    }
}
