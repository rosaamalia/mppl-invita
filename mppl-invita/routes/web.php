<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use Illuminate\Auth\Events\Login;
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

Route::get('/', [function () {
    return view('index');
}]);

Route::get('/portfolio', [function () {
    return view('portfolio');
}])->name('portfolio');

Route::get('/daftar', [RegisterController::class, 'index'])->middleware('guest')->name('daftar');
Route::post('/daftar', [RegisterController::class, 'daftar']);

Route::get('/masuk', [LoginController::class, 'index'])->middleware('guest')->name('masuk');
Route::post('/masuk', [LoginController::class, 'masuk']);
Route::post('/keluar', [LoginController::class, 'keluar']);

Route::get('/order', [OrderController::class, 'index'])->middleware('auth')->name('order');