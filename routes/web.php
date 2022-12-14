<?php

use Illuminate\Support\Facades\Route;
// use Illuminate\Auth;
use App\Http\Controllers\TagController;

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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
route::resource('foods', 'App\Http\Controllers\FoodController');
route::resource('tags', 'App\Http\Controllers\TagController');
// route::get('tags', [TagController::class, 'index'])->name('tags');
// route::post('tags', [TagController::class, 'store']);
route::resource('likes', 'App\Http\Controllers\LikeController');
route::resource('categories', 'App\Http\Controllers\CategoryController');
route::resource('cart', 'App\Http\Controllers\OrderController');








