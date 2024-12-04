<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function homePage()
    {
        return view('frontend.pages.home');
    }
}
