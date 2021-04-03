<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('login');
// });


// Route::get('/login', function () {
//     return view('login');
// });

// Route::get('/register', function () {
//     return view('register');
// });

// Route::get('/home', function () {
//     return view('home');
// });

Route::get('/', 'App\Http\Controllers\AuthController@showLogin')->name('login'); // halaman
Route::get('login', 'App\Http\Controllers\AuthController@showLogin')->name('login'); // halaman
Route::post('login', 'App\Http\Controllers\AuthController@login'); // sistem  login
Route::get('/register', 'App\Http\Controllers\AuthController@showRegister')->name('register'); // halaman
route::post('/register', 'App\Http\Controllers\AuthController@register'); // sistem Register

Route::group(['middleware' => 'auth', 'ceklevel:admin,user'], function() {
    Route::get('/home', 'App\Http\Controllers\HomeController@index')->name('home'); // halaman
    Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout'); // sistem
});

