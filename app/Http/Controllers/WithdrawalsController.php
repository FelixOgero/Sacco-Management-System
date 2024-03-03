<?php

namespace App\Http\Controllers;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\WithdrawalsModel;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class WithdrawalsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data['meta_title'] = 'Withdrawals List';
        $data['getRecord'] = WithdrawalsModel::getAllRecord();
        return view("admin.withdrawals.list", $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data['meta_title'] = 'Withdrawal Application';
        return view("admin.withdrawals.create", $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // $save = request()->validate([
        //     'id_number'=>'required',
        //     'first_name'=>'required',
        //     'middle_name' => 'required',
        //     'last_name' => 'required',
        //     'payment_method' => 'required',
        //     'reference_number' => 'required',
        //     'transaction_fee'=> 'required',
        //     'amount_withdrawn' => 'required',
        // ]);

        // $save = new WithdrawalsModel;
        // $save->id_number = trim($request->id_number);
        // $save->first_name = trim($request->first_name);
        // $save->middle_name = trim($request->middle_name);
        // $save->last_name = trim($request->last_name);
        // $save->payment_method = trim($request->payment_method);
        // $save->reference_number = trim($request->reference_number);
        // $save->transaction_fee = trim($request->transaction_fee);
        // $save->amount_withdrawn = trim($request->amount_withdrawn);
        // $save->save();

        // return redirect("admin/withdrawals/list")->with("success","Withdrawal Successfully added");


        $save = request()->validate([
            'id_number' => 'required',
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'payment_method' => 'required',
            'transaction_fee' => 'required',
            'amount_withdrawn' => 'required',
        ]);
    
        $save = new WithdrawalsModel;
        $save->id_number = trim($request->id_number);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->payment_method = trim($request->payment_method);
        
        // Generate a unique reference number (UUID)
        $save->reference_number = Str::uuid()->toString();
    
        $save->transaction_fee = trim($request->transaction_fee);
        $save->amount_withdrawn = trim($request->amount_withdrawn);
        $save->save();
    
        return redirect("admin/withdrawals/list")->with("success", "Withdrawal Successfully added");
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
        $data['meta_title'] = 'Edit Withdrawal';
        $data['getRecord'] = WithdrawalsModel::getSingle($id);
        return view("admin.withdrawals.edit", $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // dd($request->all());
        $save = WithdrawalsModel::getSingle($id);
        $save->first_name = trim($request->first_name);
        $save->middle_name = trim($request->middle_name);
        $save->last_name = trim($request->last_name);
        $save->payment_method = trim($request->payment_method);
        $save->reference_number = trim($request->reference_number);
        $save->transaction_fee = trim($request->transaction_fee);
        $save->amount_withdrawn = trim($request->amount_withdrawn);
        $save->save();
      
        return redirect("admin/withdrawals/list")->with("success","Withdrawal Successfully Updated");
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $RecordDelete = WithdrawalsModel::getSingle($id);
        $RecordDelete->delete();

        return redirect()->back()->with("success","Record Successfully Deleted");
    }

    public function export()
    {
       // Retrieve data from the database
    $withdrawals = WithdrawalsModel::all();

    // Create a new Spreadsheet
    $spreadsheet = new Spreadsheet();

    // Add a worksheet
    $sheet = $spreadsheet->getActiveSheet();

    // Add Excel headers
    $sheet->fromArray(['ID Number', 'First Name', 'Middle Name', 'Last Name', 'Payment Method', 'Reference Number', 'Transaction Fee', 'Amount Withdrawn', 'Create Date', 'Update Date'], null, 'A1');

    // Add data to the Excel file
    $row = 2;
    foreach ($withdrawals as $user) {
        $sheet->fromArray([
            $user->id_number,
            $user->first_name,
            $user->middle_name,
            $user->last_name,
            $user->payment_method,
            $user->reference_number,
            $user->transaction_fee,
            $user->amount_withdrawn,
            $user->create_date,
            $user->update_date,
        ], null, 'A' . $row);

        $row++;
    }

    // Create a new Xlsx writer and save the file
    $writer = new Xlsx($spreadsheet);

    // Set the file name and headers for the response
    $filename = 'withdrawals.xlsx';
    $headers = [
        'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
        'Content-Disposition' => 'attachment; filename="' . $filename . '"',
    ];

    // Output the Excel file to the browser
    return response()->stream(
        function () use ($writer) {
            $writer->save('php://output');
        },
        200,
        $headers
    );
    }
}
