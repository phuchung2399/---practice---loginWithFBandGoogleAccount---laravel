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

Route::get('/', function () {
    return view('welcome');
});

Route::get('login-google', 'Controller@redirectToGoogle');
Route::get('google-callback', 'Controller@loginWithGoogle');

Route::get('login-facebook', 'Controller@redirectToFacebook');
Route::get('facebook-callback', 'Controller@loginWithFacebook');

