<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Rules\MobileRule;
use App\Traits\OTPTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    use OTPTrait;

    public function register()
    {
//        $provinces = Province::all();

        return view('auth.register');
    }

    public function cities($id)
    {
        $city = City::query()->whereIn('province_id', [$id])->get();
        return $city;
    }

    public function store(Request $request)
    {
        $request->validate([
//            'name' => ['required', 'max:255', 'min:1', 'string'],
//            'last_name' => ['required', 'max:255', 'min:1', 'string'],
            'email' => 'required|email|unique:users,email',
            'mobile' => ['required', 'unique:users,mobile', new MobileRule()],
//            'position' => 'required|string|max:128',
//            'city' => ['required' ],
            'password' => ['required', 'min:8', 'confirmed'],
            'password_confirmation' => ['required', 'min:8'],
        ]);

        $mobile = $this->normalizePhoneNumber($request->mobile);

        $user = User::create([
//            'name' => $request->name,
//            'last_name' => $request->last_name,
            'email' => $request->email,
            'mobile' => $mobile,
//            'position' => $request->position,
//            'city_id' => $request->city,
            'password' => Hash::make($request->password),
        ]);

//        sms the otp code
        $otp = $this->otpRequest($user);

        return view('auth.register-code', compact('mobile'));

//        auth()->login($user);

//        return to_route('/');
    }

    public function mobileVerification(Request $request)
    {
        $num_1 = $request->num_1 ;
        $num_2 = $request->num_2 ;
        $num_3 = $request->num_3 ;
        $num_4 = $request->num_4 ;

        $code = $num_1 . $num_2 . $num_3 . $num_4;

        $bool = $this->attempt($request->mobile, $code);
        if ($bool) {
            $otpModel = $this->findUserByMobile($request->mobile);
            Auth::guard('web')->login($otpModel->user);
            return redirect('/');
        } else {
            return back()->withErrors(
                "کد صحیح نیست یا منقضی شده"
            )->onlyInput('email');
        }
    }
}
