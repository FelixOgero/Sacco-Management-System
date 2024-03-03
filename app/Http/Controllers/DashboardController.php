<?php

namespace App\Http\Controllers;

use App\Models\DividendsModel;
use App\Models\User;
use App\Models\LoanModel;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\LoanPlanModel;
use App\Models\LoanTypesModel;
use App\Models\LoanUserModel;
use App\Models\SavingsModel;
use App\Models\WebsiteLogoModel;
use App\Models\WithdrawalsModel;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class DashboardController extends Controller
{
    public function index (Request $request) {
        if (Auth::user()->is_role == 1) { //admin

            // $data['getStaffandAdminCount'] = User::where('is_delete', '=', '0')->count();
            // $data['getStaffandAdminCount'] = User::count();
            $data['getAdminCount'] = User::where('is_role', 1)->where('is_delete', 0)->count();
            $data['getStaffCount'] = User::where('is_role', 0)->where('is_delete', 0)->count();
            $data['getLoanTypeCount'] = LoanTypesModel::count();
            $data['getLoanPlanCount'] = LoanPlanModel::count();
            $data['getLoanCount'] = LoanModel::count();
            $data['getLoanUserCount'] = LoanUserModel::count();
            $data['getTotalSavings'] = SavingsModel::sum('amount');
            $data['getTotalLoan'] = LoanModel::sum('loan_amount');
            $data['getTotalWithdrawals'] = WithdrawalsModel::sum('amount_withdrawn');
            $data['getAccumulatedDividends'] = DividendsModel::sum('accumulated_amount');
            $data['getDividendsPaid'] = DividendsModel::sum('amount');
            $data['meta_title'] = 'Dashboard';

            return view('admin.dashboard.list', $data);
        } else if (Auth::user()->is_role == 0) { //staff
            $data['meta_title'] = 'Dashboard';
            return view('admin.admin_staff.dashboard', $data);
        }
    }

    public function profile (Request $request) {
        $data['getRecord'] = User::find(Auth::user()->id);
        $data['meta_title'] = 'Admin Profile';
        return view('admin.profile.update', $data);
    }

    public function profile_update (Request $request) {
        $save = request()->validate([ 
            'email'=> 'required|unique:users,email,'.Auth::user()->id,
        ]);

        $save = User::find(Auth::user()->id);
        $save->name = trim($request->name);
        $save->last_name = trim($request->last_name);
        $save->surname = trim($request->surname);
        $save->email = trim($request->email);
        $save->mobile_number = trim($request->mobile_number);
        $save->bod_date = $request->bod_date;
        
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

        if(!empty($request->password)) {
            $save->password = Hash::make($request->password);
        }

        $save->save();

        return redirect('admin/profile')->with('success','Profile Successfully Updated.');
        
    }

    public function staff_profile(Request $request){
        $data['getRecord'] = User::find(Auth::user()->id);
        $data['meta_title'] = 'Staff Profile';
        return view('admin.admin_staff.staff_profile', $data);
    }

    public function staff_profile_update(Request $request){
        $save = request()->validate([
            'email'=> 'required|unique:users,email,'.Auth::user()->id,
        ]);

        $save = User::find(Auth::user()->id);

        $save->name = trim($request->name);
        $save->last_name = trim($request->last_name);
        $save->surname = trim($request->surname);
        $save->email = trim($request->email);
        

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

        if(!empty($request->password)){
            $save->password = Hash::make($request->password);
        }

        $save->save();

        return redirect('staff/profile')->with('success','Profile Successfully Updated');
    }

    public function website_logo(Request $request){
        $data['getRecord'] = WebsiteLogoModel::find(1);
        $data['meta_title'] = 'Logo';
        return view('admin.logo.update', $data);
    }

    public function logo_update(Request $request){
        // dd($request->all());
        $save = WebsiteLogoModel::find(1);
        $save->name = trim($request->name);
        if(!empty($request->file('logo'))) {

            if(!empty($save->logo) && file_exists('upload/logo/'.$save->logo)) {
                unlink('upload/logo/'. $save->logo);
            }

            $file = $request->file('logo');
            $randomStr = Str::random(30);
            $filename = $randomStr .'.'. $file->getClientOriginalExtension();
            $file->move('upload/logo/', $filename);
            $save->logo = $filename;
        }
        $save->save();
        return redirect('admin/logo')->with('success','Logo Successfully updated');
    }
}
