<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        $setting = Settings::query()->first();
        return view('admin.pages.setting' , compact('setting'));

    }

    public function create()
    {
        $setting = Settings::query()
            ->first();
        return view('admin.pages.setting')
            ->with(['setting' => $setting ?? null]);
    }

    public function store(Request $request)
    {
        $socials = $request->only(['telegram' , 'whatsapp' , 'instagram']);

        $socials = json_encode($socials);

        $setting = Settings::query()
            ->first();

        if ($setting) {
            $setting
                ->update([
                    'about_text' =>  $request->about_text,
                    'email' =>  $request->email,
                    'mobile_number' =>  $request->mobile_number,
                    'phone_numbers' =>  $request->phone_numbers,
                    'address' =>  $request->address,
                    'socials' =>  $socials,
                ]);
        }
        else {
            $setting = Settings::query()
                ->create([
                   'about_text' =>  $request->about_text,
                   'email' =>  $request->email,
                   'mobile_number' =>  $request->mobile_number,
                   'phone_numbers' =>  $request->phone_numbers,
                   'address' =>  $request->address,
                    'socials' =>  $socials,

                ]);
        }
        return redirect()->back();
    }
}
