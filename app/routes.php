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
    return Redirect::route('landing')->with('message', ['type'=>'danger','title'=>'','content'=>'Page Not Found !!']);
});

Route::get('/', ['uses'=>'PhoneBookController@landing', 'as'=> 'landing']);

// AngularJS layout
Route::get('/phonebook-ngapp',['uses'=>'NgController@index', 'as'=>'ngapp'],  function()
{
	return View::make('angularjs.index');
});

Route::group(array('prefix' => 'dashboard'), function(){

	Route::get('phone-book', ['uses'=>'PhoneBookController@index', 'as'=> 'phone-book']);
	Route::get('phone-book/{id}/edit', ['uses'=>'PhoneBookController@edit', 'as'=> 'phone-book.edit']);
	Route::post('phone-book/{id}/update', ['uses'=>'PhoneBookController@update', 'as'=> 'phone-book.update', 'before' => 'csrf']);
	Route::post('phone-book', ['uses'=>'PhoneBookController@save', 'as'=> 'phone-book.save', 'before' => 'csrf']);
	Route::get('phone-book/{id}/delete', ['uses'=>'PhoneBookController@delete', 'as'=> 'phone-book.delete']);

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
