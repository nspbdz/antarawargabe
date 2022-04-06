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
Route::get("/wargas", "HunianWarga\WargaController@warga");
Route::post('/search', 'HunianWarga\WargaController@SearchWarga');
Route::get('/warga/{id}', 'HunianWarga\WargaController@show');
// Route::get('/wargaupdate/{id}', 'HunianWarga\WargaController@updateWarga');
// Route::get('/wargacreate', 'HunianWarga\WargaController@createWarga');
Route::post('/createwarga', 'HunianWarga\WargaController@create');
Route::patch('/updatewarga/{id}', 'HunianWarga\WargaController@update');
// Route::get("/wargas", "WargaController@index");

