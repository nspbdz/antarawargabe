<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/home', 'HomeController@index')->name('home');
// Route::get('/users', 'HomeController@index')->name('show.users');

Route::post("/login", "AuthController@login");
Route::middleware(["auth:sanctum"])->group(function () {
  Route::get("/users", "HunianWarga\UserController@index");
});
// Route::get("/users", "UserController@index");

