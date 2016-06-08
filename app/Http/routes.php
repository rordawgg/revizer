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



/**
 * Middleware group adds authentication security. 
 *	Checks if user is logged in to view listed routes.
 */
Route::group(['middleware' => "auth"], function(){
	Route::post("/doc", "DocsController@store");
	Route::get("/doc/add", "DocsController@create");
	Route::get("/doc/{doc}/edit", "DocsController@edit")->middleware("belongs");
	Route::patch("/doc/{doc}/edit", "DocsController@update")->middleware("belongs");
	Route::get("/user/me", "ProfileController@show");
	Route::patch("/user/me", "ProfileController@update");
	Route::get("/user/me/edit", "ProfileController@edit");
	Route::get("/doc/{doc}/revision/create", "RevisionsController@create")->middleware("auth_revision");
	Route::post("/doc/{doc}/revision/create", "RevisionsController@store")->middleware("auth_revision");
	Route::patch("/doc/{doc}/revision/{revision}", "RevisionsController@revise")->middleware("rev_belongs");
	Route::delete("/doc/{doc}/delete", "DocsController@delete")->middleware("belongs");
	Route::delete("/doc/{doc}/revision/{revision}/delete", "RevisionsController@delete")->middleware("rev_belongs");
});


Route::get("/", function () {
	return view("welcome");
});

Route::auth();
Route::get("/doc", "DocsController@index");
Route::get("/doc/{doc}", "DocsController@show");
Route::get("/doc/{doc}/revision/{revision}", "RevisionsController@show")->middleware("rev_belongs");
Route::get("/categories/{cat}", "CatsController@show");
Route::get("/categories", "CatsController@index");
//Route::get("/home", "HomeController@index");
Route::get("/user/{username}", "ProfileController@show");
Route::get("/search", "QueryController@search");

