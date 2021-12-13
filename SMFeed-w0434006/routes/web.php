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
Route::get("/home/posts/create", "PostController@create");
Route::post("/home/posts", "PostController@store");
Route::get("/home/themes/create", "ThemeController@create");
Route::post("/home/themes", "ThemeController@store");


Route::get("/admin/users", "UserController@index");
Route::get("/admin/users/{user}", "UserController@show");
Route::get("/admin/create", "UserController@create");
Route::post("/admin/users", "UserController@store");
Route::get("/admin/users/{user}/edit", "UserController@edit");
Route::post("/admin/users/{user}", "UserController@update");
Route::post("/admin/users/{user}/delete", "UserController@delete");







