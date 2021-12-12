<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UndanganPernikahanController;
use App\Http\Controllers\UndanganUlangTahunController;
use App\Http\Controllers\UndanganLainnyaController;
use App\Models\Order;
use Illuminate\Support\Facades\Route;
use App\Models\User;

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

Route::get('/', [LoginController::class, 'index'])->middleware('guest')->name('login');
Route::post('/masuk', [LoginController::class, 'masuk']);
Route::post('/keluar', [LoginController::class, 'keluar']);

Route::get('/dashboard', function () {
    return view('index');
})->name('index')->middleware('auth');

Route::name('pengguna')->prefix('pengguna')->group(function () {
    Route::get('/', [UserController::class, 'index'])->middleware('auth');
    Route::get('/tambah', function () {
        return view('user.tambah');
    })->middleware('auth');
    Route::post('/tambah', [UserController::class, 'tambah']);
    Route::post('/hapus', [UserController::class, 'hapus']);
    Route::get('/edit/{id}', function ($id) {
        return view('user.edit', [
            "data" => User::find($id)
        ]);
    })->middleware('auth');
    Route::post('/edit/{id}', [UserController::class, 'edit']);
});

Route::name('order')->prefix('order')->group(function () {
    Route::get('/', [OrderController::class, 'index'])->middleware('auth');
    Route::get('/tambah', function () {
        return view('order.tambah');
    })->middleware('auth');
    Route::post('/tambah', [OrderController::class, 'tambah']);
    Route::post('/hapus', [OrderController::class, 'hapus']);
    Route::get('/edit/{id}', [OrderController::class, 'update'])->middleware('auth');
    Route::post('/edit/{id}', [OrderController::class, 'edit']);
});

Route::name('pernikahan')->prefix('pernikahan')->group(function () {
    Route::get('/', [UndanganPernikahanController::class, 'index'])->middleware('auth');
    Route::get('/detail/{id}', [UndanganPernikahanController::class, 'detail'])->middleware('auth');
});

Route::name('ulang-tahun')->prefix('ulang-tahun')->group(function () {
    Route::get('/', [UndanganUlangTahunController::class, 'index'])->middleware('auth');
    Route::get('/detail/{id}', [UndanganUlangTahunController::class, 'detail'])->middleware('auth');
});

Route::name('lainnya')->prefix('lainnya')->group(function () {
    Route::get('/', [UndanganLainnyaController::class, 'index'])->middleware('auth');
    Route::get('/detail/{id}', [UndanganLainnyaController::class, 'detail'])->middleware('auth');
});