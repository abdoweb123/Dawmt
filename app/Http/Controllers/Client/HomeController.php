<?php

namespace App\Http\Controllers\Client;

use App\Http\Controllers\BasicController;
use App\Models\ClientStory;
use App\Models\EmployeeService;
use App\Models\Faq;
use App\Models\Job;
use App\Models\Module;
use App\Models\Branch;
use App\Models\Plan;
use App\Models\Post;
use App\Models\Setting;
use App\Models\SliderClient;
use App\Models\Statistic;
use App\Models\Value;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Modules\Contact\Entities\Model as Contact;
use Modules\Subscriber\Entities\Model as Subscriber;

class HomeController extends BasicController
{
    /*** Get home page ***/
    public function home(Request $request)
    {
        $sliderClients = SliderClient::Active()->get();
        $statistics = Statistic::Active()->get();
        $modules = Module::Active()->get();
        return view('client.index',compact('sliderClients','modules','statistics'));
    }


    /*** Get contact-us page ***/
    public function contactUsPage()
    {
        $branches = Branch::Active()->get();
        return view('client.contactUs',compact('branches'));
    }


    /*** save contact-us data ***/
    public function contact(Request $request)
    {
        $request->validate([
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'email' => 'email|max:255',
            'phone' => 'required|string|max:20',
            'message' => 'required|string|max:500',
        ]);

        // Create a new contact entry with the combined phone number
        Contact::create([
            'name' => $request->input('first_name') .' '. $request->input('last_name') ,
            'phone' => $request->input('phone_code').$request->input('phone'),  // Use the combined phone number
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
        ]);
        session()->flash('toast_message', ['type' => 'success', 'message' => __('front.message_received')]);
        return redirect()->back();
    }


    /*** sidePages (terms, privacy, faq) ***/
    public function sidePages($type)
    {
        $type = Setting::where('type',$type)->first()->type;
        return view('client.sidePages',compact('type'));
    }


    /*** Get faq page ***/
    public function faq()
    {
        $faqs = Faq::Active()->get();
        return view('client.faq',compact('faqs'));
    }

    /*** Get essApplication page ***/
    public function ess_application()
    {
        $employeeServices = EmployeeService::Active()->get();
        return view('client.app',compact('employeeServices'));
    }


    /*** Get plans page ***/
    public function plans()
    {
        $plans = Plan::query()->Active()->orderBy('arrangement')->get();
        return view('client.plans',compact('plans'));
    }


    /*** Get values page ***/
    public function values()
    {
        $normal_values = Value::query()->Active()->where('show_type', '!=', 'full')->orderBy('arrangement')->get();
        $big_values = Value::query()->Active()->where('show_type', '=', 'full')->get();
        return view('client.values',compact('normal_values','big_values'));
    }


    /*** Get videos page ***/
    public function videos()
    {
        $recent_videos = Video::query()->Active()->orderBy('created_at', 'desc')->limit(10)->get();
        $popular_videos = Video::query()->Active()->where('most_popular',1)->get();

        return view('client.videos',compact('recent_videos','popular_videos'));
    }


    /*** Get videos page ***/
    public function clientStories()
    {
        $statistics = Statistic::Active()->get();
        $clientStories = ClientStory::Active()->get();
        return view('client.clientStories', compact('statistics','clientStories'));
    }


    /*** Get jobs page ***/
    public function jobs()
    {
        $jobs = Job::Active()->get();
        return view('client.jobs', compact('jobs'));
    }


    /*** Get job_details page ***/
    public function jobDetails($id, $name=null)
    {
        $job = Job::where('id',$id)->firstOrfail();
        return view('client.jobDetails', compact('job'));
    }


    /*** Get blog page ***/
    public function blog()
    {
        $topPost = Post::where('show_in_top', 1)->first() ?? Post::first();
        $headPost = Post::where('show_in_head', 1)->first() ?? Post::first();
        $recent_posts = Post::query()->Active()->orderBy('created_at', 'desc')->limit(10)->get();
        $popular_posts = Post::query()->Active()->where('most_popular',1)->get();

        return view('client.blog',compact('recent_posts', 'popular_posts', 'topPost', 'headPost'));
    }



    /*** Get post_details page ***/
    public function post_details($id, $post_name=null)
    {
        $post = Post::where('id',$id)->firstOrfail();
        $recent_posts = Post::query()->Active()->orderBy('created_at', 'desc')->limit(3)->get();

        return view('client.bolgDetails',compact('post','recent_posts'));
    }


} //end of class



