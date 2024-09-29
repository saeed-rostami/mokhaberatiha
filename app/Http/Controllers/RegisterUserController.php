<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use App\Traits\EmailOTPTrait;
use App\Traits\OTPTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
    use EmailOTPTrait;
    public function register()
    {
        $provinces = Province::all();

        return view('auth.register', compact('provinces'));
    }

    public function cities($id)
    {
        $city = City::query()->whereIn('province_id', [$id])->get();
        return $city;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255', 'min:1', 'string'],
            'last_name' => ['required', 'max:255', 'min:1', 'string'],
            'email' => 'required|email|unique:users',
            'position' => 'required|string|max:128',
            'city' => ['required' ],
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'last_name' => $request->last_name,
            'email' => $request->email,
            'position' => $request->position,
            'city_id' => $request->city,
            'password' => Hash::make($request->password),
        ]);

//        send otp to email

        $this->otpRequest($user);
//        auth()->login($user);

//        return to_route('/');
    }
}
