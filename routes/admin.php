<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/

        
    Route::group(['namespace' => 'Admin' , 'middleware' => 'auth:admin' , 'prefix' => 'admin'], function () {

        Route::get('/',[DashboardController::class,'index'])->name('admin.dashboard');
        Route::get('logout',[LoginController::class,'logout'])->name('admin.logout');
        ///////////////Admins Controller/////////////////////
        Route::group (['prefix'=>'admins'], function()
        {
            Route::get('/'           , [AdminController::class,'index'])->name('admins.index');
            Route::get('create'      , [AdminController::class,'create'])->name('admins.create');
            Route::post('store'      , [AdminController::class,'store'])->name('admins.store');
            Route::get('edit/{id}'   , [AdminController::class,'edit'])->name('admins.edit');
            Route::post('update/{id}', [AdminController::class,'update'])->name('admins.update');
            Route::get('delete/{id}' , [AdminController::class,'destroy'])->name('admins.destroy');

        });
        ///////////////Brands Controller/////////////////////
        Route::group (['prefix'=>'brands'], function()
        {
            Route::get('/'           , [BrandController::class,'index'])->name('brands.index');
            Route::get('create'      , [BrandController::class,'create'])->name('brands.create');
            Route::post('store'      , [BrandController::class,'store'])->name('brands.store');
            Route::get('edit/{id}'   , [BrandController::class,'edit'])->name('brands.edit');
            Route::post('update/{id}', [BrandController::class,'update'])->name('brands.update');
            Route::get('delete/{id}' , [BrandController::class,'destroy'])->name('brands.destroy');

        });

        ///////////////categories Controller/////////////////////
        Route::group (['prefix'=>'categories'], function()
        {
            Route::get('/'           , [CategoryController::class,'index'])->name('categories.index');
            Route::get('create'      , [CategoryController::class,'create'])->name('categories.create');
            Route::post('store'      , [CategoryController::class,'store'])->name('categories.store');
            Route::get('edit/{id}'   , [CategoryController::class,'edit'])->name('categories.edit');
            Route::post('update/{id}', [CategoryController::class,'update'])->name('categories.update');
            Route::get('delete/{id}' , [CategoryController::class,'destroy'])->name('categories.destroy');

        });

        
    }); // routes for authenticated admins

    Route::group(['namespace' => 'Admin' , 'middleware' => 'guest:admin','prefix' => 'admin'], function () {

        //login
        Route::get('login',[LoginController::class,'login'])->name('admin.login');
        Route::post('login',[LoginController::class,'postlogin'])->name('admin.post.login');

        //forget and reset password
        Route::post('forget-password', [LoginController::class, 'submitForgetPasswordForm'])->name('admin.forget.password.post'); 
        Route::get('reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('admin.reset.password.get');
        Route::post('reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('admin.reset.password.post');


    });// routes for un-authenticated admins
