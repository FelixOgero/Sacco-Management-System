<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login() {
        return view("auth.login");
    }
    public function login_post(Request $request) {
        // dd($request->all());
        if (Auth::attempt(["email" => $request->email, "password" => $request->password], true)) {
            if(Auth::user() -> is_role == '1') {
                return redirect()->intended('admin/dashboard');
            } else if (Auth::user() -> is_role == '0') {
                return redirect()->intended('staff/dashboard');
            } else {
                return redirect()->back()->with('error','Please enter the correct credentials');
            }
        } else {
            return redirect()->back()->with('error','please enter the correct credentials');
        }
    }

    public function register(Request $request) {
        return view("auth.register");
    }

    public function forgot(Request $request) {
        return view("auth.forgot");
    }

    public function register_post(Request $request) {
        // dd($request->all());

        $user = request()->validate([
            "name" => "required",
            "email"=> "required|unique:users",
            "password"=> "required|min:6",

        ]);

        $user = new User;
        $user->name = trim($request->name);
        $user->last_name = trim($request->last_name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->remember_token = Str::random(50);
        $user->save();

        return redirect('/')->with('success','Registered successfully');
    }

    public function logout() {
        Auth::logout();
        return redirect( url('/'));
    }
}
