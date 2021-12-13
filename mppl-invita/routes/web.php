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

Route::get('/blog', [function () {
    return view('blog');
}])->name('blog');

Route::get('/faq', [function () {
    return view('faq');
}])->name('faq');

Route::name('order')->prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->middleware('auth');
    Route::get('/buat', [OrderController::class, 'buat'])->middleware('auth');
    Route::post('/buat', [OrderController::class, 'buatUndangan']);
    Route::get('/undangan/{id}/edit', [OrderController::class, 'edit'])->middleware('auth');
    Route::post('/undangan/{id}/edit', [OrderController::class, 'editUndangan']);
    Route::get('/undangan/{id}/preview', [OrderController::class, 'preview'])->middleware('auth');
});

Route::get('/order/undangan/{id}', [OrderController::class, 'detail'])->middleware('auth')->name('undangan');

Route::get('/akun', [function () {
    return view('akun');
}])->name('akun');

Route::get('/harga', [function () {
    return view('harga');
}])->name('harga');