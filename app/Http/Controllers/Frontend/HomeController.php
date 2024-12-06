<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use App\Models\Special;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::latest('id')->get();
        $special = Special::where('id', 1)->first();
        return view('frontend.pages.home', compact(
            'sliders',
            'special',
        ));
    }
}
