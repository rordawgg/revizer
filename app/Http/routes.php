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
	//Future Feature
	//Route::get("/doc/{doc}/edit", "DocsController@edit")->middleware("belongs");
	//Route::patch("/doc/{doc}/edit", "DocsController@update");
	Route::get("/user/me", "ProfileController@show");
	Route::patch("/user/me", "ProfileController@update");
	Route::get("/user/me/edit", "ProfileController@edit");
	Route::get("/doc/{doc}/revision/create", "RevisionsController@create")->middleware("auth_revision");
	Route::post("/doc/{doc}/revision/create", "RevisionsController@store")->middleware("auth_revision");
	Route::patch("/doc/{doc}/revision/{revision}", "RevisionsController@revise")->middleware("rev_belongs");
});


Route::get("/", function () {
	return view("welcome");
});

Route::get("/doc", "DocsController@index");
Route::get("/search", "DocsController@search");
Route::get("/doc/{doc}", "DocsController@show");
Route::auth();
Route::get('/home', 'HomeController@index');
Route::get("/user/{username}", "ProfileController@show");
Route::get("/doc/{doc}/revision/{revision}", "RevisionsController@show")->middleware("rev_belongs");
