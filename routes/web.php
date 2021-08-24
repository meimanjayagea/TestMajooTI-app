<?php

use Illuminate\Support\Facades\Route;
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

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'is_admin: ADMIN']], function () {
    Route::get('/', [HomeController::class, 'index']);
    
    Route::resource('/product', ProductController::class);
});
Auth::routes();

Route::middleware(['auth:sanctum', 'verified', 'is_admin'])
    ->get('/admin', [HomeController::class, 'index'])->name('admin');
