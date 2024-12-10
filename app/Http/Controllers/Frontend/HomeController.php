<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Blog;
use App\Models\Counter;
use App\Models\Faq;
use App\Models\Feature;
use App\Models\gallery;
use App\Models\Slider;
use App\Models\Special;
use App\Models\Testimonial;
use App\Models\Volunteer;

class HomeController extends Controller
{
    public function homePage()
    {
        $sliders = Slider::latest('id')->get();
        $special = Special::where('id', 1)->first();
        $features = Feature::where('status', 1)->get();
        return view('frontend.pages.home', compact(
            'sliders',
            'special',
            'features',
        ));
    }

    public function aboutPage()
    {
        $testimonials = Testimonial::where('status', 1)->latest('id')->limit(3)->get();
        $special = Special::where('id', 1)->first();
        $counter = Counter::where('id', 1)->first();
        return view('frontend.pages.about', compact(
            'special',
            'testimonials',
            'counter',
        ));
    }

    public function faqPage()
    {
        $faqs = Faq::latest('id')->get();
        return view('frontend.pages.faq', compact('faqs'));
    }

    public function volunteerPage()
    {
        $volunteers = Volunteer::paginate(8);
        return view('frontend.pages.volunteer', compact('volunteers'));
    }

    public function galleryPage()
    {
        $photos = gallery::latest('id')->paginate(9);
        return view('frontend.pages.gallery', compact('photos'));
    }

    public function blogPage()
    {
        $blogs = Blog::latest('id')->paginate(9);
        return view('frontend.pages.blog.index', compact('blogs'));
    }

    public function singleBlogPage($id)
    {
        $blog_detail = Blog::with('category')->first();
        $recent_news = Blog::latest('id')->limit(6)->get();
        return view('frontend.pages.blog.show', compact('blog_detail', 'recent_news'));
    }

}
