<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;

use App\Category;

use App\About;

use App\Post;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer('*',function($view){
            $firstAbout = About::where('onTop',1)->latest()->first();

            $tableNames = ['slider','category','post','about','contact','subscriber'];
            $actions = ['show' => 'data',
                        'create' => 'add',
                        'edit' => 'edit'];

            $categories = Category::all();

            $popular_posts = Post::orderby('view_count','desc')->take(4)->get();

            $view->with([
                'tableNames' => $tableNames, 
                'actions' => $actions, 
                'categories' => $categories,
                'firstAbout' => $firstAbout,
                'popular_posts' => $popular_posts
            ]);
            
        });
        
        Schema::defaultStringLength(191);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
