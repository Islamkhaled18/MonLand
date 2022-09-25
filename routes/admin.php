<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\SettingController;
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
         ################################## products Controller ######################################
         Route::group(['prefix' => 'products'], function () {
            Route::get('/',  [ProductController::class,'index'])->name('products.index');
            Route::get('general-information',  [ProductController::class,'create'])->name('products.general.create');
            Route::post('store-general-information',  [ProductController::class,'store'])->name('products.general.store');

            Route::get('price/{id}',  [ProductController::class,'getPrice'])->name('products.price');
            Route::post('price',  [ProductController::class,'saveProductPrice'])->name('products.price.store');

            Route::get('stock/{id}',  [ProductController::class,'getStock'])->name('products.stock');
            Route::post('stock',  [ProductController::class,'saveProductStock'])->name('products.stock.store');

            Route::get('images/{id}',  [ProductController::class,'addImages'])->name('products.images');
            Route::post('images',  [ProductController::class,'saveProductImages'])->name('products.images.store');
            Route::post('images/db',  [ProductController::class,'saveProductImagesDB'])->name('products.images.store.db');

            Route::get('delete/{id}' , [ProductController::class,'destroy'])->name('products.destroy');

        });


              ///////////////attributes Controller/////////////////////
              Route::group (['prefix'=>'attributes'], function()
              {
                  Route::get('/'           , [AttributeController::class,'index'])->name('attributes.index');
                  Route::get('create'      , [AttributeController::class,'create'])->name('attributes.create');
                  Route::post('store'      , [AttributeController::class,'store'])->name('attributes.store');
                  Route::get('edit/{id}'   , [AttributeController::class,'edit'])->name('attributes.edit');
                  Route::post('update/{id}', [AttributeController::class,'update'])->name('attributes.update');
                  Route::get('delete/{id}' , [AttributeController::class,'destroy'])->name('attributes.destroy');
      
              });

            ################################## brands options ######################################
            Route::group(['prefix' => 'options'], function () {
                Route::get('/',  [OptionController::class,'index'])->name('options.index');
                Route::get('create',  [OptionController::class,'create'])->name('options.create');
                Route::post('store',  [OptionController::class,'store'])->name('options.store');
                Route::get('edit/{id}',  [OptionController::class,'edit'])->name('options.edit');
                Route::post('update/{id}',  [OptionController::class,'update'])->name('options.update');
                Route::get('delete/{id}', [OptionController::class,'destroy']) -> name('options.destroy');

            });
            ################################## settings ######################################
            Route::group(['prefix' => 'settings'], function () {
                Route::get('/',  [SettingController::class,'index'])->name('settings.index');
                Route::post('update/{id}',  [SettingController::class,'update'])->name('settings.update');

            });

              ################################## delivery options ######################################
              Route::group(['prefix' => 'delivery'], function () {
                Route::get('/',  [DeliveryController::class,'index'])->name('delivery.index');
                Route::get('create',  [DeliveryController::class,'create'])->name('delivery.create');
                Route::post('store',  [DeliveryController::class,'store'])->name('delivery.store');
                Route::get('edit/{id}',  [DeliveryController::class,'edit'])->name('delivery.edit');
                Route::post('update/{id}',  [DeliveryController::class,'update'])->name('delivery.update');
                Route::get('delete/{id}', [DeliveryController::class,'destroy']) -> name('delivery.destroy');

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
