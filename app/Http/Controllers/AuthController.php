<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Rules\MobileRule;
use App\Traits\OTPTrait;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

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
            'mobile' => ['required', new MobileRule()],
        ]);

        $otp = $this->otpRequest($mobile);
        $code = $otp->otp;
//        TODO SEND THE OTP CODE

        return view('auth.otp-code-verification', compact('mobile', 'code'));
    }

    public function otpVerification(Request $request)
    {

        $request->validate([
            'num_1' => ['required', 'string', 'min:1', 'max:1'],
            'num_2' => ['required', 'string', 'min:1', 'max:1'],
            'num_3' => ['required', 'string', 'min:1', 'max:1'],
            'num_4' => ['required', 'string', 'min:1', 'max:1'],
        ]);
        $num_1 = $request->num_1;
        $num_2 = $request->num_2;
        $num_3 = $request->num_3;
        $num_4 = $request->num_4;

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
//            'username' => ['required', 'unique:users,username'],
//            'first_name' => ['required', 'max:255', 'min:2', 'string'],
//            'last_name' => ['required', 'max:255', 'min:2', 'string'],
//            'address' => ['required', 'max:255', 'min:8', 'string'],
            'email' => 'required|email|unique:users,email',
//            'mobile' => ['required', 'unique:users,mobile', new MobileRule()],
            'job_position' => 'required|string|max:128',
            'city' => ['required', 'exists:cities,id'],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $user = Auth::user();
        $user->update([
//            'username' => $request->username,
//            'first_name' => $request->first_name,
//            'last_name' => $request->last_name,
            'email' => $request->email,
            'city_id' => $request->city,
            'job_position' => $request->job_position,
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
        $mobile = $this->normalizePhoneNumber($request->mobile);
        $request->merge([
            'mobile' => $mobile
        ]);

        $credentials = $request->validate([
            'mobile' => ['required', 'exists:users,mobile', new MobileRule()],
            'password' => ['required'],
        ]);

        $remember = (bool)$request->remember;

        if (Auth::attempt($credentials, $remember)) {
            $request->session()->regenerate();


            return redirect('/');
        }

        return back()->withErrors([
            'email' => 'شماره همراه یا رمز عبور صحیح نیست.',
        ])->onlyInput('mobile');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function getCity($id)
    {
        return City::query()->where('province_id', $id)->get();
    }

    public function forgotOTPForm()
    {
        return view('auth.forgot-password');
    }

    public function sendForgotOTP(Request $request)
    {
        $mobile = $this->normalizePhoneNumber($request->mobile);
        $request->merge([
            'mobile' => $mobile
        ]);
        $request->validate([
            'mobile' => ['required', 'exists:users,mobile', new MobileRule()],
        ]);

        $otp = $this->forgotOTPRequest($mobile);

        return view('auth.forgot-password-code')
            ->with(['otp' => $otp, 'mobile' => $mobile]);

    }

    public function verifyForgotAndLogin(Request $request)
    {
        $request->validate([
            'num_1' => ['required', 'string', 'min:1', 'max:1'],
            'num_2' => ['required', 'string', 'min:1', 'max:1'],
            'num_3' => ['required', 'string', 'min:1', 'max:1'],
            'num_4' => ['required', 'string', 'min:1', 'max:1'],
            'mobile' => ['required', 'exists:users,mobile'],
        ]);
        $num_1 = $request->num_1;
        $num_2 = $request->num_2;
        $num_3 = $request->num_3;
        $num_4 = $request->num_4;

        $code = $num_1 . $num_2 . $num_3 . $num_4;
        $mobile = $request->mobile;

        $user = User::query()
            ->where('mobile', $mobile)
            ->first();

        $bool = $this->attempt($mobile, $code);
        if ($bool) {
            $password = Str::random(8);
            $password_hashed = Hash::make($password);
            $user->update([
                'password' => $password_hashed,
            ]);
            Auth::guard('web')->login($user);

            return redirect()->route(
                'website.index'
            );
        }
        return redirect()->route(
            'website.index'
        );
    }
}
