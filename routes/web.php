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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('blog','BlogController');

Route::get('/search', 'BlogController@search');




/*Route::get('/{page}', function($slug){

	$page = \App\Page::findBySlug($slug);

	return view('pages', compact('page'));

});*/



Route::resource('admin','AdminController');

//Route::get('test', 'TestController@index');