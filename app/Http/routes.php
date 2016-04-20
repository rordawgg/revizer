<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It"s a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/




Route::group(['middleware' => "auth"], function(){
	
	Route::post("/doc", "DocsController@store");
	Route::get("/doc/add", "DocsController@create");
	Route::get("/doc/{doc}/edit", ["middleware" => "belongs", "uses" => "DocsController@edit"]);
	Route::patch("/doc/{doc}/edit", "DocsController@update");
});


Route::get("/", function () {
    	return view("welcome");
	});

Route::get("/doc", "DocsController@index");
Route::post("/search", "DocsController@search");
Route::get("/doc/{doc}", "DocsController@show");
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get("/user/profile/{username}", "ProfileController@show");
