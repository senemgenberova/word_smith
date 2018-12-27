<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Subscriber;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session, Mail;
use App\Category;

use App\Mail\NewPostMail;

class PostsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('backEnd.admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('backEnd.admin.posts.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required', 
            'title' => 'required|max:255' , 
            'description' => 'required', 
            'image' => 'required|image|mimes:png,jpeg,jpg' 
        ]);

        if(auth()->check()){

            if(request()->hasFile('image')){
                $path = public_path() . '\upload\post\\';
                $image = now()->toDateString() . '_' . request('image')->getClientOriginalName();

                request('image')->move($path,$image);
            }


            $post = Post::create([
                'user_id' => auth()->id(),
                'category_id' => request('category_id'), 
                'title' => request('title'), 
                'description' => request('description'), 
                'image' => $image,
                'post_slug' => $this->create_post_slug(request('title')),
                'view_count' => 0
            ]);

            Session::flash('message', 'Post added!');
            Session::flash('status', 'success');

            Mail::to(Subscriber::all())->send(new NewPostMail($post));
        }       

        return redirect()->route('post_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Post $post)
    {
        // $post = Post::findOrFail($id);

        return view('backEnd.admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Post $post)
    {
        $categories = Category::all();

        return view('backEnd.admin.posts.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Post $post, Request $request)
    {
        $this->validate($request, [
            'category_id' => 'required', 
            'title' => 'required|max:255', 
            'description' => 'required', 
            'image' => 'image|mimes:png,jpeg,jpg' 
        ]);

        if(auth()->check()){
            if(request()->hasFile('image')){
                $path = public_path() . '\upload\post\\';
                $image = now()->toDateString() . '_' . request('image')->getClientOriginalName();

                \File::delete($path . $post->image);

                request('image')->move($path,$image);
            }
            else{
                $image = $post->image;
            }

            $post->update([
                'user_id' => auth()->id(),
                'category_id' => request('category_id'), 
                'title' => request('title'), 
                'description' => request('description'), 
                'image' => $image,
                'post_slug' => $this->create_post_slug(request('title')) 
            ]);

            Session::flash('message', 'Post updated!');
            Session::flash('status', 'success');
        }

        return redirect()->route('post_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function delete(Post $post)
    {
        // $post = Post::findOrFail($id);

        $post->delete();

        \File::delete(public_path() . '\upload\post\\' . $post->image);

        Session::flash('message', 'Post deleted!');
        Session::flash('status', 'success');

        return redirect()->route('post_index');
    }

    public function create_post_slug($title){
        $post_slug = str_slug($title,'-');
            
        $post_count = Post::where('post_slug', $post_slug)->count();

        if($post_count != 0){
            $post_count++;
            $post_slug .= '-' . $post_count;
        }

        return $post_slug;
    }

}
