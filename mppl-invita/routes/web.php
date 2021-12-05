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

Route::get('/', ['as' => 'index', function () {
    return view('index');
}]);

Route::get('/portfolio', ['as' => 'portfolio', function () {
    return view('portfolio');
}]);

Route::get('/daftar', ['as' => 'daftar', function () {
    return view('daftar');
}]);

Route::get('/masuk', ['as' => 'masuk', function () {
    return view('login');
}]);