<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Mail\StaffNewAccountCreateMail;

class StaffController extends Controller
{
    public function index(Request $request) {
        $data['getRecord'] = User::getAllRecord();
        $data['meta_title'] = 'Staff List';
        return view("admin.staff.list", $data);
    }

    public function add(Request $request) {
        $data['meta_title'] = 'Add Staff';
        return view('admin.staff.add', $data);
    }

    public function add_store(Request $request) {
		
		// dd($request->all());

        $save = request()->validate([ 
            'name'=>'required',
            'surname' => 'required',
            'email'=> 'required|unique:users',
            'is_role' => 'required',
            'password'=> 'required',
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

        $random_password = $request->password;

        $save->password = Hash::make($random_password);

        $save->save();

        $save->random_password = $random_password;

        Mail::to($save->email)->send(new StaffNewAccountCreateMail($save)); 

        return redirect('admin/staff/list')->with('success','Account Successfully Created.');
        
    }

    public function staff_delete($id, Request $request) {
        $getRecordDelete = User::getSingle($id);
        $getRecordDelete -> is_delete = 1;
        $getRecordDelete -> save();
        // $getRecordDelete->delete();
        return redirect()->back()->with('success','Record Successfully Deleted.');
    }

    public function staff_edit($id, Request $request) {
        $data['getRecord'] = User::getSingle($id); 
        $data['meta_title'] = 'Edit Staff';
        return view('admin.staff.edit', $data);
    }

    public function staff_edit_update($id, Request $request) { 
        // dd($request->all());

        $save = request()->validate([ 
            'name'=>'required',
            'surname' => 'required',
            'email'=> 'required',
            // 'email'=> 'required|unique:users',
            'is_role' => 'required',
        ]);

        $save = User::getSingle($id);
        $save->name = trim($request->name);
        $save->last_name = trim($request->last_name);
        $save->surname = trim($request->surname);
        $save->email = trim($request->email);
        $save->mobile_number = trim($request->mobile_number);
        $save->bod_date = $request->bod_date;
        $save->is_role = $request->is_role;
        
        if(!empty($request->file('profile_image'))) {

            if(!empty($save->profile_image) && file_exists('upload/profile/'.$save->profile_image)) {
                unlink('upload/profile/'. $save->profile_image);
            }

            $file = $request->file('profile_image');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'. $file->getClientOriginalExtension();
            $file->move('upload/profile', $filename);
            $save->profile_image = $filename;
        }

        $save->remember_token = Str::random(50);

        $save->save();

        return redirect('admin/staff/list')->with('success','Account Successfully Updated.');
        
    }

    public function staff_view($id){
        $data['getRecord'] = User::getSingle($id);
        // $data['getRecord'] = User::where('id', $id)->where('is_delete', 0)->first();
        $data['meta_title'] = 'View Staff';
        return view('admin.staff.view', $data);
    }
}
