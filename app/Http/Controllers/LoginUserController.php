<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

//        TODO IF FIND THE USER AND THE MOBILE IS NOT VERIFIED MUST RETURN TO VERIFY MOBILE (OF COURSE MUST SENT OTP TO MOBILE)
        $remember = (bool)$request->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور صحیح نیست.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect('/');
    }
}
