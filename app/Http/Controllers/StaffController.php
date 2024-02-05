<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(Request $request) {
        $data['getRecord'] = User::getAllRecord();
        return view("admin.staff.list", $data);
    }

    public function add(Request $request) {
        return view('admin.staff.add');
    }

    public function add_store(Request $request) {
		
		dd($request->all());

        $save = request()->validate([ 
            'name'=>'required',
            'surname' => 'required',
            'email'=> 'required|unique:users',
            'is_role' => 'required',
        ]);

        $save = new User();
        $save->name = trim($request->name);
        $save->last_name = trim($request->last_name);
        $save->surname = trim($request->surname);
        $save->email = trim($request->email);
        $save->mobile_number = trim($request->mobile_number);
        $save->bod_date = $request->bod_date;
        $save->is_role = $request->is_role;
        
        if(!empty($request->file('profile_image'))) {
            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'. $file->getClientOriginalExtension();
            $file->move('upload/profile', $filename);
            $save->profile_image = $filename;
        }

        $save->remember_token = Str::random(50);

        $save->save();

        return redirect('admin/staff/list')->with('success','Account Successfully Created.');
    }
}
