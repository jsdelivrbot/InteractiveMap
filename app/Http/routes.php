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
    return view('home');
});

Route::get('/index', function () {
    return view('index');
});

Route::post('/verify', function () {
    return $_POST; //change later
    // redirect('buildings');
});

Route::get('/landing', function () {
    return view('layouts.landing');
});

Route::get('/buildings', 'HomeController@buildings');

Route::get('/modify', 'HomeController@modify');

Route::get('/b', 'BuildController@all');

Route::get('/b/{id}', 'BuildController@bID');

Route::get('/b/not/{id}', 'BuildController@notId');

Route::get('/search/{string}','BuildController@search'); //just to debug search scripts
// Route::get('search',
// 	array('as' => 'search', 'uses'=>'BuildController@search')
// 	);

// Route::get('/autocomplete','BuildController@search');

Route::get('/autocomplete','BuildController@autocomplete'); //doesn't give descriptions :(
// 	'as' => 'autocomplete', 
// 	'uses'=>'BuildController@autocomplete'
// 	);

// Route::post('/modify/added','BuildController@create');// create
// Route::post('/modify/update/{id}','BuildController@update'); //update
// Route::delete('/modify/removed', 'BuildController@destroy'); //destroy

Route::get('/test',function(){
    return view('test');
});

Route::get('/buildimgs/{name}', [
    'uses' => 'BuildController@findImg',
    'as' => 'build.image'
]);

Route::post('/modify/added','BuildController@debug');// create
Route::post('/modify/update/{id}','BuildController@debug'); //update
Route::delete('/modify/removed', 'BuildController@debug'); //destroy

// Route::get('/results',function(){
// 	return $_GET;
// });
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
