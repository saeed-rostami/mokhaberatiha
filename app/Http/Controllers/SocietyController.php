<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Province;
use App\Models\Society;
use Illuminate\Http\Request;

class SocietyController extends Controller
{
    public function index($province_id = 26)
    {
        $provinces = Province::all();
        $societies = Society::all();

        if ($province_id) {
            $cities = City::query()
                ->where('province_id', $province_id)
                ->pluck('id')
            ->toArray();
            $societies = Society::query()
            ->whereIn('city_id' , $cities)->paginate();

        }

        return view('website.society-index')
            ->with([
               'societies' => $societies,
               'provinces' => $provinces,
            ]);
    }
}
