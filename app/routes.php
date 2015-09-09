<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

App::missing(function($exception)
{
    return View::make('hello')->withMessage('Page Not Found !');
});

Route::get('/', function()
{
	return View::make('hello');
});

Route::group(array('prefix' => 'dashboard'), function(){ // 'before' => 'api.auth'

	Route::get('phone-book', ['uses'=>'PhoneBookController@index', 'as'=> 'phone-book']);

});


Route::group(array('prefix' => 'resource'), function(){ // 'before' => 'api.auth'

	Route::resource('contact', 'ContactController');

	/*if(Request::ajax()){

		Route::resource('contact', 'ContactController');

	}else{

		Route::get('contact', function(){
			return 'HTTP';
		});
	}*/

});
