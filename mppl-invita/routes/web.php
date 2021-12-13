<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\AkunController;
use App\Http\Controllers\ReviewController;
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
}])->name('index');

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

Route::get('/review', [ReviewController::class, 'index'])->name('review');

Route::name('order')->prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->middleware('auth');

    Route::get('/buat/ulangtahun', [OrderController::class, 'buatUlangTahun'])->middleware('auth');
    Route::post('/buat/ulangtahun', [OrderController::class, 'buatUndanganUlangTahun']);
    Route::get('/undangan/ulangtahun/{id}/edit', [OrderController::class, 'editUlangTahun'])->middleware('auth');
    Route::post('/undangan/ulangtahun/{id}/edit', [OrderController::class, 'editUndanganUlangTahun']);
    Route::get('/undangan/ulangtahun/{id}/preview', [OrderController::class, 'previewUlangTahun'])->middleware('auth');

    Route::get('/buat/pernikahan', [OrderController::class, 'buatPernikahan'])->middleware('auth');

    Route::get('/harga', [function () {
        return view('harga');
    }]);
    Route::get('/review/{id}', [OrderController::class, 'review'])->middleware('auth');
    Route::post('/review/{id}', [OrderController::class, 'reviewUndangan']);
});

Route::get('/order/undangan/ulangtahun/{id}', [OrderController::class, 'detailUlangTahun'])->middleware('auth')->name('undangan');

Route::get('/akun', [AkunController::class, 'akun'])->name('akun');
Route::post('/akun', [AkunController::class, 'update']);

Route::get('/order/pembayaran', [function () {
    return view('order.pembayaran');
}])->name('pembayaran');

Route::get('/order/bukutamu', [function () {
    return view('order.bukutamu');
}])->name('bukutamu');