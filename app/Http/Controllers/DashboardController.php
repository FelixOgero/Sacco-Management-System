<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index (Request $request) {
        if (Auth::user()->is_role == 1) { //admin
            return view('admin.dashboard.list');
        } else if (Auth::user()->is_role == 0) { //staff
            return view('admin.staff.list');
        }
    }
}
