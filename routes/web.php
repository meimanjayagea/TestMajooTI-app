<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\WebController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\Admin\ProductController;

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

Route::get('/', [WebController::class, 'index']);
Route::get('beli/{id}', [PesanController::class, 'index']);

Route::post('beli/{id}', [PesanController::class, 'pesan']);
Route::get('detail_pesanan', [PesanController::class, 'detail_pesanan']);

Route::delete('detail_pesanan/{id}', [PesanController::class, 'detail_pesanan']);
Route::get('berhasil_order', [PesanController::class, 'berhasil']);


Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin: ADMIN']], function () {
    Route::get('/', [HomeController::class, 'index']);
    Route::resource('/product', ProductController::class);
});

Auth::routes();

Route::middleware(['auth:sanctum', 'verified', 'is_admin'])
    ->get('/admin', [HomeController::class, 'index'])->name('admin');
