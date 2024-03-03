<?php

namespace App\Http\Controllers;

use App\Models\DividendsModel;
use Illuminate\Http\Request;

class DividendsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meta_title'] = 'Dividends List';
        // $data['getAllRecord'] = DividendsModel::getAllRecord();
        $data['getRecord'] = DividendsModel::all();
        return view("admin.dividends.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['meta_title'] = 'Dividend Application';
        return view("admin.dividends.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $save = request()->validate([
            'id_number'=>'required|unique:dividends',
            'first_name'=>'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'accumulated_amount' => 'required',
            'amount' => 'required',
        ]);

        $save = new DividendsModel;
        $save->id_number = trim($request->id_number);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->accumulated_amount = trim($request->accumulated_amount);
        $save->amount = trim($request->amount);
        $save->save();

        return redirect("admin/dividends/list")->with("success","Dividend Successfully added");
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
        $data['meta_title'] = 'Edit Dividend';
        $data['getRecord'] = DividendsModel::getSingle($id);
        return view("admin.dividends.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $save = DividendsModel::getSingle($id);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->accumulated_amount = trim($request->accumulated_amount);
        $save->amount = trim($request->amount);
        $save->save();
      
        return redirect("admin/dividends/list")->with("success","Dividend Successfully Updated");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $RecordDelete = DividendsModel::getSingle($id);
        $RecordDelete->delete();

        return redirect()->back()->with("success","Record Successfully Deleted");
    }
}
