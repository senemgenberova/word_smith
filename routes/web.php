<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => 'auth'],function(){

	Route::prefix('category')->group(function(){
		Route::get('/','CategoriesController@index')->name('category_index');
		Route::get('/create','CategoriesController@create')->name('category_create');
		Route::get('/{category}','CategoriesController@show')->name('show_category');
		Route::get('/{category}/edit','CategoriesController@edit')->name('edit_category');

		Route::post('/store','CategoriesController@store')->name('category_store');
		Route::post('/{category}/update','CategoriesController@update')->name('update_category');
		Route::post('/{category}/delete','CategoriesController@delete')->name('delete_category');
	});

	Route::prefix('slider')->group(function(){
		Route::get('/','SlidersController@index')->name('slider_index');
		Route::get('/create','SlidersController@create')->name('slider_create');
		Route::get('/{slider}','SlidersController@show')->name('show_slider');
		Route::get('/{slider}/edit','SlidersController@edit')->name('edit_slider');

		Route::post('/store','SlidersController@store')->name('slider_store');
		Route::post('/{slider}/update','SlidersController@update')->name('update_slider');
		Route::post('/{slider}/delete','SlidersController@delete')->name('delete_slider');
	});

	Route::prefix('post')->group(function(){
		Route::get('/','PostsController@index')->name('post_index');
		Route::get('/create','PostsController@create')->name('post_create');
		Route::get('/{post}','PostsController@show')->name('show_post');
		Route::get('/{post}/edit','PostsController@edit')->name('edit_post');

		Route::post('/store','PostsController@store')->name('post_store');
		Route::post('/{post}/update','PostsController@update')->name('update_post');
		Route::post('/{post}/delete','PostsController@delete')->name('delete_post');
	});

	Route::prefix('contact')->group(function(){
		Route::get('/','ContactsController@index')->name('contact_index');
		Route::get('/create','ContactsController@create')->name('contact_create');
		Route::get('/{contact}','ContactsController@show')->name('show_contact');
		Route::get('/{contact}/edit','ContactsController@edit')->name('edit_contact');

		Route::post('/store','ContactsController@store')->name('contact_store');
		Route::post('/{contact}/update','ContactsController@update')->name('update_contact');
		Route::post('/{contact}/delete','ContactsController@delete')->name('delete_contact');
	});

	Route::prefix('about')->group(function(){
		Route::get('/','AboutsController@index')->name('about_index');
		Route::get('/create','AboutsController@create')->name('about_create');
		Route::get('/{about}','AboutsController@show')->name('show_about');
		Route::get('/{about}/edit','AboutsController@edit')->name('edit_about');

		Route::post('/store','AboutsController@store')->name('about_store');
		Route::post('/{about}/update','AboutsController@update')->name('update_about');
		Route::post('/{about}/delete','AboutsController@delete')->name('delete_about');
	});

	Route::prefix('subscriber')->group(function(){
		Route::get('/','SubscribersController@index')->name('subscriber_index');
		// Route::get('/{subscriber}','SubscribersController@show')->name('show_subscriber');

		// Route::post('/{subscribe}/delete','SubscribersController@delete')->name('delete_subscriber');
	});

});

Route::get('/hash/{password}', function($password){

	return Hash::make($password);
	
});

Route::get('/','HomeController@index')->name('home');

Route::get('/home','HomeController@index')->name('home');

Route::get('/post/{post}','HomeController@showPost')->name('single_post');

Route::get('/category/{category}','CategoryController@index')->name('category');

Route::get('/about','HomeController@about')->name('about');

Route::get('/contact','ContactController@index')->name('contact');

Route::post('/subscribe', 'HomeController@subscribe')->name('subscribe');

Route::post('/sendMessage', 'ContactController@sendMessage')->name('send_message');

Auth::routes();