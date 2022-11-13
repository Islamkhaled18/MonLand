<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ContactUsController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');



Route::group(['namespace' => 'Site' , 'middleware' => 'auth:web' , 'prefix' => 'Site'], function () {

    Route::get('AllCategories',[CategoryController::class,'allCategory'])->name('Site.allCategory');

    Route::get('contactUs',[ContactUsController::class ,'index'])->name('Site.contactUs');


});// routes for authenticated users

Route::group(['namespace' => 'Site' , 'middleware' => 'guest:web','prefix' => 'Site'], function () {





});// routes for un-authenticated users
