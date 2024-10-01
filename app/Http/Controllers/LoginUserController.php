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

        $remember = (bool)$request->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'ایمیل یا رمز عبور صحیح نیست.',
        ])->onlyInput('email');
    }

    public function logout(Request $request){
        Auth::logout();
        return redirect('/');
    }
}
