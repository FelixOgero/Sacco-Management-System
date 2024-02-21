<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Mail\ForgotPasswordMail;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    public function login() {
        $data['meta_title'] = 'Login';
        return view("auth.login", $data);
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
        $data['meta_title'] = 'Register';
        return view("auth.register", $data);
    }

    public function forgot(Request $request) {
        $data['meta_title'] = 'Forgot';
        return view("auth.forgot", $data);
    }

    public function forgot_post(Request $request) {
        // dd($request->all());
        $count = User::where("email", $request->email)->count();
        if ($count > 0) {

            $user = User::where("email", $request->email)->first();
            $random_pass = rand(111111, 999999);
            $user->password = Hash::make($random_pass);
            $user->save();

            $user->random_pass = $random_pass;

            Mail::to($user->email)->send(new ForgotPasswordMail($user));

            return redirect('/')->with('success','Password has been successfully sent to your email');

            // return redirect()->back()->with("success","Password has been sent to your email");


        } else {
            return redirect()->back()->with("error","Email not found");
        }
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

    public function terms(){
        return view('auth.terms');
    }

    public function logout() {
        Auth::logout();
        return redirect( url('/'));
    }
    
}
