<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        return view('dashboard.index');
    }

    public function notfound()
    {
        return view('dashboard.notfound');
    }

    public function sendmesssage() {
        return view('dashboard.sendmesssage');
    }
}
