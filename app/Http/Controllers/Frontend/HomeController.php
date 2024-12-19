<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\Reply;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\gallery;
use App\Models\Special;
use App\Models\Volunteer;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $blog_detail = Blog::with('category')->where('id', $id)->first();
        $recent_news = Blog::latest('id')->limit(6)->get();
        $comments = Comment::with(['reply' => function ($query) {
            $query->where('status', 'Accept');
        }])->where('blog_id', $id)->where('status', 'Accept')->latest('id')->get();
        $tags = collect(explode(',', $blog_detail->tags))->unique()->values();
        return view('frontend.pages.blog.show', compact('blog_detail', 'recent_news', 'tags', 'comments'));
    }

    public function submitComment(Request $request)
    {
        $request->validate([
            'blog_id' => 'required|numeric',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'comment' => 'required|string',
        ]);

        Comment::create([
            'blog_id' => $request->blog_id,
            'name' => $request->full_name,
            'email' => $request->email,
            'comment' => $request->comment,
        ]);
        return redirect()->back()->with('success', "Comment submitted successfully.");
    }
    public function submitReply(Request $request)
    {
        $request->validate([
            'comment_id' => 'required|numeric',
            'full_name' => 'required|string',
            'email' => 'required|email',
            'reply' => 'required|string',
        ]);

        Reply::create([
            'comment_id' => $request->comment_id,
            'name' => $request->full_name,
            'email' => $request->email,
            'comment' => $request->reply,
        ]);
        return redirect()->back()->with('success', "Reply submitted successfully.");
    }
}
