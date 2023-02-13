<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Barang_masukController;
use App\Http\Controllers\MasterbarangController;
use App\Http\Controllers\PenjualanController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\JabatanController;



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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function() {
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);
    Route::resource('products', ProductController::class);
    Route::resource('jabatan', Controller::class);
    Route::resource('kategori', UserController::class);
    Route::resource('master_barang', UserController::class);
    Route::resource('pegawai', UserController::class);
    Route::resource('penjualan', UserController::class);
    Route::resource('barang_masuk', UserController::class);
});