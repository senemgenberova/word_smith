<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;

use App\Post;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
    	$posts = $category->posts()->paginate(1);

    	return view('front.category.index',compact('category','posts'));
    }
}
