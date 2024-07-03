<?php

namespace App\Http\Controllers;

use App\Models\User;
use Doctrine\Inflector\Rules\English\Rules;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules\Password;
use App\Models\IranCity;
use App\Models\IranCounty;
use App\Models\IranProvince;
use Illuminate\Support\Facades\Hash;

class RegisterUserController extends Controller
{
    public function register()
    {
        $provinces = IranProvince::active()->get();

        return view('auth.register', ['provinces' => $provinces]);
    }

    public function cities($id)
    {
        $city = IranCity::active()->whereIn('province_id', [$id])->get();
        return $city;
    }

    public function store(Request $request)
    {

        $request->validate([
            'name' => ['required', 'max:255', 'min:1', 'string'],
            'email' => 'required|email|unique:users',
            'password' => ['required', 'min:8', 'confirmed', Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        auth()->login($user);



        return to_route('posts.index');
    }
}
