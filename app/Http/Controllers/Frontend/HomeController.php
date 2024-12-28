<?php

namespace App\Http\Controllers\Frontend;

use App\Models\Faq;
use App\Models\Blog;
use App\Models\User;
use App\Models\Event;
use App\Models\Reply;
use App\Models\Slider;
use App\Models\Comment;
use App\Models\Counter;
use App\Models\Feature;
use App\Models\gallery;
use App\Models\Special;
use App\Models\OtherPage;
use App\Models\Volunteer;
use App\Models\Subscriber;
use App\Mail\ContactUsMail;
use App\Models\EventTicket;
use App\Models\Testimonial;
use Illuminate\Http\Request;
use App\Models\GeneralSetting;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use App\Mail\SubscriberVerificationMail;

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
        }])
            ->where('blog_id', $id)
            ->where('status', 'Accept')
            ->latest('id')
            ->withCount(['reply as reply_count' => function ($query) {
                $query->where('status', 'Accept');
            }])
            ->get();
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

    public function eventPage()
    {
        $events = Event::latest('id')->paginate(4);
        return view('frontend.pages.event.index', compact('events'));
    }

    public function singleEventPage($slug)
    {
        $event = Event::where('slug', $slug)->first();
        $recent_events = $events = Event::latest('id')->limit(5)->select('id', 'name', 'slug')->get();
        return view('frontend.pages.event.show', compact('event', 'recent_events'));
    }

    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:subscribers,email',
        ]);
        $token = md5(time());
        Subscriber::create([
            'email' => $request->email,
            'token' => $token,
        ]);
        $url = Url('subscriber/verify/' . $token . '/' . $request->email);
        Mail::to($request->email)->send(new SubscriberVerificationMail($url));
        return redirect()->back()->with('success', 'An email has been sent to you, Please check and verify your email.');
    }

    public function subscriberVerification($token, $email)
    {
        $subscriber = Subscriber::where('email', $email)->where('token', $token)->first();
        if ($subscriber->status == 1) {
            return redirect()->route('homePage')->with('warning', 'Email already verified.');
        }
        if ($subscriber) {
            $subscriber->update([
                'token' => $token,
                'status' => 1,
            ]);
            return redirect()->route('homePage')->with('success', 'Your email has been verified successfully.');
        } else {
            return redirect()->route('homePage')->with('error', 'Invalid email or token.');
        }
    }

    public function privacyPolicy()
    {
        $data = OtherPage::where('id', 1)->first();
        return view('frontend.pages.privacy_policy', compact('data'));
    }
    public function termsCondition()
    {
        $data = OtherPage::where('id', 1)->first();
        return view('frontend.pages.terms_condition', compact('data'));
    }

    public function contactPage()
    {
        $setting = GeneralSetting::where('id', 1)->first();
        return view('frontend.pages.contact', compact('setting'));
    }

    public function contactSubmit(Request $request)
    {
        $request->validate([
            'full_name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'message' => 'required|string',
        ]);
        $fullname = $request->full_name;
        $email = $request->email;
        $subject = $request->subject;
        $mail_message = $request->message;
        $admin_email = User::where('id', 1)->first()->email;
        Mail::to($admin_email)->send(new ContactUsMail($fullname, $email, $subject, $mail_message));
        return redirect()->back()->with('success', 'Thanks for your message. We will contact you soon.');
    }

    public function userEventTicket()
    {
        $eventTicket = EventTicket::where('user_id',Auth::user()->id)->where('payment_status', 'COMPLETED')->latest('id')->get();
        $total_ticket = EventTicket::where('user_id',Auth::user()->id)->sum('number_of_tickets');
        return view('user_dashboard.event.event_ticket', compact('eventTicket', 'total_ticket'));
    }
    public function userEventTicketInvoice($id)
    {
        $TicketInvoice = EventTicket::with('user','event')->where('id', $id)->first();
        $billed_to=User::where('id',1)->first();
        return view('user_dashboard.event.event_ticket_invoice', compact('TicketInvoice','billed_to'));
    }
}
