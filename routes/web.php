<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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
Auth::routes();

Route::get('/', function () {
    return view('welcome');
});
Route::get('/home', function () {
    return view('home');
});
Route::get('/blog', function () {
    return view('blog');
});
Route::get('/newBlog', function () {
    return view('createblog');
});
Route::get('/admin', function () {
    return view('adminview');
});
Route::get('/edit', function () {
    return view('blogedit');
});




// Route::get('/home', 'HomeController@index')->name('home');
