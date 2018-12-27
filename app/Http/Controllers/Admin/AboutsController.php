<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

use App\About;

class AboutsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $abouts = About::all();

        return view('backEnd.admin.abouts.index', compact('abouts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.abouts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required|max:50', 
            'content' => 'required', 
        ]);

        About::create([
            'title' => request('title'),
            'content' => request('content'),
            'onTop' => request('onTop')
        ]);

        Session::flash('message', 'About added!');
        Session::flash('status', 'success');

        return redirect()->route('about_index');
    }


    public function show(About $about)
    {

       // return $about;
       return view('backEnd.admin.abouts.show', compact('about'));
    }


    public function edit(About $about)
    {
        return view('backEnd.admin.abouts.edit', compact('about'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(About $about, Request $request)
    {
        $this->validate($request, ['title' => 'required|max:50', 'content' => 'required', ]);

        $about->update([
            'title' => request('title'),
            'content' => request('content'),
            'onTop' => request('onTop')
        ]);

        Session::flash('message', 'About updated!');
        Session::flash('status', 'success');

        return redirect()->route('about_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function delete(About $about)
    {
        $about->delete();

        Session::flash('message', 'About deleted!');
        Session::flash('status', 'success');

        return redirect()->back();
    }

}
