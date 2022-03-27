<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DiscountController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HotelController;
use App\Http\Controllers\LoginController;
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

Route::get('/admin/login', [LoginController::class, 'getLogin'])->name('get_login');
Route::post('/admin/login', [LoginController::class, 'postLogin'])->name('post_login');
Route::get('/admin/logout', [LoginController::class, 'logout'])->name('logout');

Route::get('/admin/forgot-password', [LoginController::class, 'getForgotPassword'])->name('get_forgot_password');
Route::post('/admin/forgot-password', [LoginController::class, 'postForgotPassword'])->name('post_forgot_password');
Route::get('/admin/reset-password', [LoginController::class, 'getResetPassword'])->name('get_reset_password');
Route::post('/admin/reset-password/{email}', [LoginController::class, 'postResetPassword'])->name('post_reset_password');

Route::get('/', [HomeController::class, 'index'])->name('client.index');
Route::get('/tours', [HomeController::class, 'tourList'])->name('client.tours.list');
Route::get('/tours/{id}', [HomeController::class, 'tourDetail'])->name('client.tours.detail');
Route::get('/articles', [HomeController::class, 'articleList'])->name('client.articles.list');
Route::get('/articles/{id}', [HomeController::class, 'articleDetail'])->name('client.articles.detail');
Route::get('/login', [HomeController::class, 'getLogin']);
Route::get('/booking', [HomeController::class, 'booking']);

Route::group(['prefix' => 'admin', 'middleware' => 'admin_middleware'], function () {
    Route::get('/', [AdminController::class, 'index']);
    
    Route::resource('/categories', CategoryController::class);
    Route::resource('/tags', TagController::class);
    Route::resource('/articles', ArticleController::class);
    Route::resource('/tours', TourController::class);
    Route::resource('/tour-guides', TourGuideController::class);
    Route::resource('/hotels', HotelController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/discounts', DiscountController::class);
    Route::resource('/bookings', BookingController::class);
});

Route::post('/upload', [PostTasksController::class, 'upload']);