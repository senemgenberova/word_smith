<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Slider;

use App\Post;

use App\About;

use App\Contact;

use App\Subscriber;

use App\Mail\SubscriberMail;

use Session, Mail;

class HomeController extends Controller
{
    public function index()
    {

        $sliders = Slider::where('inSlide',1)->get();

        $posts = Post::latest()->paginate(6);

        return view('front.home.index',compact('sliders','posts'));
    }

    public function showPost(Post $post){

        $post->increment('view_count',1);

        $nextPost = Post::where('id','>', $post->id)->first();

        $previousPost = Post::where('id','<', $post->id)->latest()->first();

        return view('front.home.single_post',compact('post','nextPost','previousPost'));
    }

    public function subscribe(){
        $this->validate(request(),[
            'email' => 'required|email'
        ]);

        foreach (Subscriber::all() as $s) {
            if($s->email == request('email')){
                Session::flash('fail','You already subscribed!');

                return back();
            }
        }

        $subscriber = Subscriber::create([
            'email' => request('email')
        ]);

        Mail::to($subscriber)->send(new SubscriberMail($subscriber));

        Session::flash('success','Successfully subscribed!');

        return back();

    }

    public function about(){

    	$abouts = About::all();

    	return view('front.home.about',compact('abouts'));
    }

}
