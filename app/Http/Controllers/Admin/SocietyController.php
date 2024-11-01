<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Province;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function index()
    {
        $societies = Society::query()
            ->paginate(15);


        return view('admin.pages.society')
            ->with([
                'societies' => $societies,
            ]);

    }

    public function create()
    {
        $provinces = Province::all();

        return view('admin.components.societyCreate', compact('provinces'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:32',
            'description' => 'required|string|max:500',
            'code' => 'required|string|',
            'city_id' => ['required', 'exists:cities,id'],
        ]);
         Society::query()
            ->create([
               'name' => $request->name,
               'description' => $request->description,
               'code' => $request->code,
               'city_id' => $request->city_id,
            ]);

        return redirect()->route('admin.society.index');
    }

    public function delete(Society $society)
    {
        $society->delete();
        return redirect()->route('admin.society.index');

    }
}
