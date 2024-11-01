<?php

namespace App\Http\Controllers\Admin;

use App\Exports\UsersExport;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class UserController extends Controller
{
    public function index()
    {
        $users = User::query()->paginate(25);
        return view('admin.pages.user', compact('users'));
    }

    public function export()
    {
        return Excel::download(new UsersExport, 'users.xlsx');
    }
}
