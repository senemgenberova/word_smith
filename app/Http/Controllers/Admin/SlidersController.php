<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Slider;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;
use File;

class SlidersController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $sliders = Slider::all();

        return view('backEnd.admin.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'title' => 'required|max:255', 
            'image' => 'required|image|mimes:png,jpeg,jpg', 
            'inSlide' => 'required', 
        ]);

        if(request()->hasFile('image')){
            $path = public_path() . '\upload\slider\\'; 
            $image_name = now()->toDateString() .'_'. request('image')->getClientOriginalName();
            
            request('image')->move($path,$image_name);
        }

        Slider::create([
            'title' => strtoupper(request('title')), 
            'image' => $image_name, 
            'inSlide' => request('inSlide') 
        ]);

        Session::flash('message', 'Slider added!');
        Session::flash('status', 'success');

        return redirect()->route('slider_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Slider $slider)
    {
        // $slider = Slider::findOrFail($id);

        return view('backEnd.admin.sliders.show', compact('slider'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Slider $slider)
    {
        // $slider = Slider::findOrFail($id);

        return view('backEnd.admin.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Slider $slider, Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:255', 
            'image' => 'image|mimes:png,jpeg,jpg', 
            'inSlide' => 'required', 
        ]);

        if(request()->hasFile('image')){
            $path = public_path() . '\upload\slider\\'; 
            $image_name = now()->toDateString() .'_'. request('image')->getClientOriginalName();

            File::delete(asset('/upload/slider/' . $slider->image));
            
            request('image')->move($path,$image_name);
        }
        else{
            $image_name = $slider->image;
        }

        
        $slider->update([
            'title' => request('title'), 
            'image' => $image_name, 
            'inSlide' => request('inSlide'),  
        ]);

        Session::flash('message', 'Slider updated!');
        Session::flash('status', 'success');

        return redirect()->route('slider_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function delete(Slider $slider)
    {
        // $slider = Slider::findOrFail($id);

        $slider->delete();
        \File::delete(public_path() . '\upload\post\\' . $slider->image);

        Session::flash('message', 'Slider deleted!');
        Session::flash('status', 'success');

        return redirect()->route('slider_index');
    }

}
