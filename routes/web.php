<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('home');
});

Route::get('/main', [\App\Http\Controllers\MainPageController::class, 'index']);


//users
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index']);

//registration
Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//products
Route::get('/products', [\App\Http\Controllers\Product\ProductController::class, 'index'])->name('product.index');
Route::get('/products/create', [\App\Http\Controllers\Product\ProductController::class, 'create'])->name('product.create');
Route::post('/products', [\App\Http\Controllers\Product\ProductController::class, 'store'])->name('product.store');
Route::get('/products/{product}', [\App\Http\Controllers\Product\ProductController::class, 'show'])->name('product.show');


