<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Slider;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders=Slider::latest('id')->get();
        return view('frontend.pages.home',compact(
            'sliders',
        ));
    }
}
