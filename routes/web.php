<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ExpirationController;
use App\Http\Controllers\MedicamentsController;
use App\Http\Controllers\VentesController;
use App\Http\Controllers\StocksController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoriesController;


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



Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::resource('/cart', CartController::class);
Route::resource('/expiration', ExpirationController::class);
Route::resource('/medicaments', MedicamentsController::class);
Route::resource('/stocks', StocksController::class);
Route::resource('/ventes', VentesController::class);
Route::resource('/carts', CartController::class);

Route::get('/prints', [StocksController::class, 'print']);
Route::get('/print', [VentesController::class, 'print']);
Route::get('/categories', [CategoriesController::class, 'cate']);




