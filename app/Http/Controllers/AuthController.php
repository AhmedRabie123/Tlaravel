<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Mail\websiteMail;
use Hash;
use Auth;
use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function index()
    {
        return view('authenticate.home');
    }

    public function dashboard_user()
    {
        return view('authenticate.dashboard');
    }

    // public function dashboard_admin()
    // {

    //     return view('authenticate.dashboard-admin');
    // }

    // public function setting()
    // {
    //     return view('authenticate.settings');

    // }


    public function registers()
    {
        return view('authenticate.registers');
    }

    public function registration_submit(Request $request)
    {

        $token = hash('sha256', time());

        $users = new user();
        $users->name = $request->name;
        $users->email = $request->email;
        $users->password = Hash::make($request->password);
        $users->status = 'pending';
        $users->token = $token;
        // $users->role = 2;
        $users->save();

        $verification_link = url('registration/verify/' . $token . '/' . $request->email);
        $subject = 'registration verification';
        $message = 'please click on this link: <br><a href="' . $verification_link . '">Click Here</a>';

        \Mail::to($request->email)->send(new websiteMail($subject, $message));

        echo 'email is sent';
    }

    public function registration_verify($token, $email)
    {

        $users = user::where('token', $token)->where('email', $email)->first();

        if (!$users) {
            return redirect()->route('login');
        }

        $users->status = 'Active';
        $users->token = '';
        $users->update();

        echo 'email verify successfully';
    }


    public function login()
    {
        return view('authenticate.login');
    }

    public function login_submit(Request $request)
    {

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
            'status' => 'Active'
        ];

        if (Auth::attempt($credentials)) {

            return redirect()->route('dashboard_user');
        } else {

            return redirect()->route('login');
        }
    }

    public function logout()
    {

        Auth::guard('web')->logout();

        return Redirect()->route('login');
    }


    public function forget_password()
    {
        return view('authenticate.forget_password');
    }

    public function forget_password_submit(Request $request)
    {
        $token = hash('sha256', time());

        $user = user::where('email', $request->email)->first();

        if (!$user) {
            //    dd('Email Not Found');
            echo 'Email Not Found';
        }

        $user->token = $token;
        $user->update();

        $reset_link = url('reset-password/' . $token . '/' . $request->email);
        $subject = 'Reset Password';
        $message = 'please click on this link: <br><a href="' . $reset_link . '">Click Here</a>';

        \Mail::to($request->email)->send(new websiteMail($subject, $message));

        echo 'Check your email';
    }

    public function reset_password($token, $email)
    {

        $user = user::where('token', $token)->where('email', $email)->first();
        if (!$user) {
            return redirect()->route('login');
        }

        return view('authenticate.reset_password', compact('token', 'email'));
    }

    public function reset_password_submit(Request $request)
    {

        $user = user::where('token', $request->token)->where('email', $request->email)->first();

        $user->password = Hash::make($request->new_password);
        $user->token = '';
        $user->update();

        echo ' password is reset successfully';
    }
}
