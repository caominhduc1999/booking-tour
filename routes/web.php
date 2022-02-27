<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\PostTasksController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TourGuideController;
use App\Http\Controllers\UserController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.pages.index');
    });
    
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/tours', TourController::class);
    Route::resource('/tour-guides', TourGuideController::class);
    Route::resource('/hotels', HotelController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/discounts', DiscountController::class);
});

Route::post('/upload', [PostTasksController::class, 'upload']);