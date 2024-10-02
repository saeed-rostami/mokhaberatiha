<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Rules\MobileRule;
use App\Traits\OTPTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use OTPTrait;

    public function otpForm()
    {
        return view('auth.otp-code');
    }

    public function sendOtp(Request $request)
    {
        $mobile = $this->normalizePhoneNumber($request->mobile);
        $request->merge([
           'mobile' => $mobile
        ]);
        $request->validate([
            'mobile' => ['required' , new MobileRule()],
        ]);

        $otp = $this->otpRequest($mobile);
        $code = $otp->otp;
//        TODO SEND THE OTP CODE

        return view('auth.otp-code-verification', compact('mobile' , 'code'));
    }

    public function otpVerification(Request $request)
    {

        $request->validate([
            'num_1' => ['required' , 'string' , 'min:1' , 'max:1'],
            'num_2' => ['required' , 'string' , 'min:1' , 'max:1'],
            'num_3' => ['required' , 'string' , 'min:1' , 'max:1'],
            'num_4' => ['required' , 'string' , 'min:1' , 'max:1'],
        ]);
        $num_1 = $request->num_1 ;
        $num_2 = $request->num_2 ;
        $num_3 = $request->num_3 ;
        $num_4 = $request->num_4 ;

        $code = $num_1 . $num_2 . $num_3 . $num_4;
//        verify code and verified mobile at
        $bool = $this->attempt($request->mobile, $code);
        if ($bool) {
            $otpModel = $this->findUserByMobile($request->mobile);
            Auth::guard('web')->login($otpModel->user);

            if (isset($otpModel->user->email)) {
                return redirect('/');
            }

            Auth::user()->update([
               'mobile_verified_at' => Carbon::now()
            ]);

            return redirect('register');
        } else {
            return back()->withErrors(
                "کد صحیح نیست یا منقضی شده"
            );
        }
    }

    public function registerRequest(Request $request)
    {
        $request->validate([
//            'name' => ['required', 'max:255', 'min:1', 'string'],
//            'last_name' => ['required', 'max:255', 'min:1', 'string'],
            'email' => 'required|email|unique:users,email',
//            'mobile' => ['required', 'unique:users,mobile', new MobileRule()],
//            'position' => 'required|string|max:128',
//            'city' => ['required', 'exists:cities,id'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $user = Auth::user();
        $user->update([
            'email' => $request->email,
            'city_id' => $request->city,
            'password' => Hash::make($request->password),
        ]);

        return redirect('/');

    }

    public function registerForm()
    {
        $provinces = Province::all();

        return view('auth.register', compact('provinces'));
    }

    public function loginForm()
    {
        return view('auth.login');

    }

    public function login(Request $request)
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

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }
}
