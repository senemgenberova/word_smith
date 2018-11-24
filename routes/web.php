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

Route::group(['namespace' => 'Admin','prefix' => 'admin','middleware' => ['auth']],function(){

	Route::prefix('category')->group(function(){
		Route::get('/','CategoriesController@index')->name('cat_index');
		Route::get('/create','CategoriesController@create')->name('cat_create');
		Route::get('/{category}','CategoriesController@show')->name('show_cat');
		Route::get('/{category}/edit','CategoriesController@edit')->name('edit_cat');

		Route::post('/store','CategoriesController@store')->name('cat_store');
		Route::post('/{category}/update','CategoriesController@update')->name('update_cat');
		Route::post('/{category}/delete','CategoriesController@delete')->name('delete_cat');
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

});

Auth::routes();