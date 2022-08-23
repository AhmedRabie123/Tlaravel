<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Admin;
use App\Mail\websiteMail;
use Hash;
use Auth;

class AdminController extends Controller
{
    public function admin_login()
    {
        return view('Admin.login');
    }

    public function admin_login_submit(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password

        ];

        if (Auth::guard('admin')->attempt($credentials)) {

            return redirect()->route('admin_dashboard');
        } else {

            return redirect()->route('admin_login');
        }
    }


    public function admin_logout()
    {

        Auth::guard('admin')->logout();

        return Redirect()->route('admin_login');
    }

    public function admin_dashboard()
    {
        return view('Admin.dashboard');
    }

    public function admin_setting()
    {
        return view('Admin.settings');
    }
}
