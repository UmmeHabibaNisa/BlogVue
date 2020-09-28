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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('/saveblog', 'BlogController@store');
Route::get('/blog/{id}', 'BlogController@getOne');
Route::get('/blog/edit/{id}', 'BlogController@getOne');
Route::put('/blog/{blog}', 'BlogController@update');

Route::get('/blogs', 'BlogController@index');
Route::post('/savePicture', 'BlogController@fileStore');
Route::delete('/blog/{id}', 'BlogController@destroy');
