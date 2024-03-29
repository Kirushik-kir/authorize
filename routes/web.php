<?php

use Illuminate\Support\Facades\Auth;
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

Route::get('/', [\App\Http\Controllers\MainPageController::class, 'index'])->name('main');
Route::get('/home', [\App\Http\Controllers\HomePageController::class, 'index'])->name('home')->middleware('auth');


//users
Route::get('/users', [\App\Http\Controllers\UserController::class, 'index'])->name('user.index');

//registration
Auth::routes();
Route::get('/authorize', function () {
    return redirect('login');
});


