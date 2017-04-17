<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('index');
});

Route::get('/index', function () {
    return view('index');
});

Route::get('/landing', function () {
    return view('layouts.landing');
});

Route::get('/buildings', function () {
	$searchPH = 'Search building';
    return view('pages.building',compact('searchPH'));
});

Route::get('/modify', function () {
	$searchPH = 'Search to Edit';

    return view('pages.modify',compact('searchPH'));
});

// Route::get('/logout', function () {
//     return view('settings');
// });


/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
