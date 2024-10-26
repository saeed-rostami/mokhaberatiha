<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Poll;
use Illuminate\Http\Request;

class PollController extends Controller
{

    public function index()
    {
        return Poll::all();
    }
    public function create()
    {
        return view('');
    }

    public function store(Request $request)
    {
        Poll::query()
            ->create([
               'title' => $request->title,
               'end_at' => $request->end_at,
               'is_active' => $request->is_active,
            ]);

        return true;
    }
}
