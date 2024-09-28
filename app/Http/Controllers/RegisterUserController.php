<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class RegisterUserController extends Controller
{
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
            'phone_number' => ['required'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'last_name' => $request->last_name,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);
        return view("index");

//        return to_route('dashboard.index');
    }
}
