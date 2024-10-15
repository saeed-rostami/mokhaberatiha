<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Settings;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
    public function index()
    {
        return Settings::class;
    }

    public function create()
    {

    }

    public function store(Request $request)
    {

    }

    public function edit()
    {

    }

    public function update(Request $request)
    {

    }

//    public function delete()
//    {
//
//    }
}
