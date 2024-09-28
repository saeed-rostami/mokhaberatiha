<?php

namespace App\Http\Controllers;

use App\Models\Note;
use App\Models\Notice;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $users_count = User::query()->count();
        $notices_count = Notice::query()->count();
        return view('dashboard.index')
            ->with([
                "users_count" => $users_count,
                "notices_count" => $notices_count,
            ]);
    }

    public function notfound()
    {
        return view('dashboard.notfound');
    }

    public function sendmesssage() {
        return view('dashboard.sendmesssage');
    }
}
