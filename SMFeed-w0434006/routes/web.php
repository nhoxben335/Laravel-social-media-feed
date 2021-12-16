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
Route::post("/home/posts", "PostController@store");
Route::get("/home/posts/create", "PostController@create");
Route::get("/home/themes/create", "ThemeController@create");
Route::post("/home/themes", "ThemeController@store");


Route::get("/admin/users", "UserController@index");
Route::get("/admin/users/{user}", "UserController@show");
Route::get("/admin/create", "UserController@create");
Route::post("/admin/users", "UserController@store");
Route::get("/admin/users/{user}/edit", "UserController@edit");
Route::post("/admin/users/{user}", "UserController@update");
Route::post("/admin/users/{user}/delete", "UserController@delete");

Route::get("/home", "PostController@index");
Route::get("/home/posts", "PostController@index");
Route::get("/home/posts/{post}", "PostController@show");
Route::get("/home/posts/{post}/edit", "PostController@edit");
Route::post("/home/posts/{post}", "PostController@update");
Route::post("/home/posts/{post}/delete", "PostController@delete");

Route::get("/home/themes", "ThemeController@index");
Route::get("/home/themes/{theme}", "ThemeController@show");
Route::get("/home/themes/{theme}/edit", "ThemeController@edit");
Route::post("/home/themes/{theme}", "ThemeController@update");
Route::post("/home/themes/{theme}/delete", "ThemeController@delete");





