<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Category;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Session;

class CategoriesController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = Category::all();

        return view('backEnd.admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('backEnd.admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store(Request $request)
    {       
        $this->validate($request, ['category_name' => 'required' ]);

        foreach (Category::all() as $c) {
            if($c->category_name == strtolower(request('category_name'))){
                Session::flash('fail', 'This category already exists!');

                return redirect()->back();
            }
        }

        if(!Session::has('fail')){
            Category::create([
                'category_name' => strtolower(request('category_name')),
                'category_slug' => str_slug(request('category_name'),'-')
            ]);

            Session::flash('message', 'Category added!');
            Session::flash('status', 'success');
        }

        return redirect()->route('category_index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function show(Category $category)
    {
        // $category = Category::findOrFail($id);

        return view('backEnd.admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function edit(Category $category)
    {
        // $category = Category::findOrFail($id);

        return view('backEnd.admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function update(Category $category, Request $request)
    {
        $this->validate($request, ['category_name' => 'required', ]);

        foreach (Category::all() as $c) {
            if($c->category_name == strtolower(request('category_name'))){
                Session::flash('fail', 'This category already exists!');

                return redirect()->back();
            }
        }

        if(!Session::has('fail')){
            $category->update([
                'category_name' => request('category_name'),
                'category_slug' =>str_slug(request('category_name'),'-')
            ]);

            Session::flash('message', 'Category updated!');
            Session::flash('status', 'success'); 
        }


        return redirect()->route('category_index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return Response
     */
    public function delete(Category $category)
    {
        // $category = Category::findOrFail($id);

        $category->delete();

        Session::flash('message', 'Category deleted!');
        Session::flash('status', 'success');

        return redirect()->back();
    }

}
