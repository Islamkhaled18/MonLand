<?php

use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\AttributeController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\DeliveryController;
use App\Http\Controllers\Admin\DeliveryPolicyController;
use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\VendorController;
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

            Route::get('edit/{id}'   , [ProductController::class,'edit'])->name('products.edit');
            Route::post('update/{id}', [ProductController::class,'update'])->name('products.update');

            Route::post('delete/{id}' , [ProductController::class,'destroy'])->name('products.destroy');

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

            ///////////////roles Controller/////////////////////
        Route::group (['prefix'=>'roles'], function()
        {
            Route::get('/'           , [RoleController::class,'index'])->name('roles.index');
            Route::get('create'      , [RoleController::class,'create'])->name('roles.create');
            Route::post('store'      , [RoleController::class,'store'])->name('roles.store');
            Route::get('edit/{id}'   , [RoleController::class,'edit'])->name('roles.edit');
            Route::post('update/{id}', [RoleController::class,'update'])->name('roles.update');
            Route::get('delete/{id}' , [RoleController::class,'destroy'])->name('roles.destroy');

        });

          ################################## profile ######################################
          Route::group(['prefix' => 'profiles'], function () {
            Route::get('edit/{id}',  [AdminProfileController::class,'edit'])->name('adminsProfile.edit');
            Route::post('update/{id}',  [AdminProfileController::class,'update'])->name('adminsProfile.update');

        });

        ################################## delivery options ######################################
        Route::group(['prefix' => 'vendors'], function () {
            Route::get('/',  [VendorController::class,'index'])->name('vendors.index');
            Route::get('create',  [VendorController::class,'create'])->name('vendors.create');
            Route::post('store',  [VendorController::class,'store'])->name('vendors.store');
            Route::get('edit/{id}',  [VendorController::class,'edit'])->name('vendors.edit');
            Route::post('update/{id}',  [VendorController::class,'update'])->name('vendors.update');
            Route::get('delete/{id}', [VendorController::class,'destroy']) -> name('vendors.destroy');

        });
        ################################## Contact Us ######################################
        Route::group(['prefix' => 'ContactUs'], function () {
            Route::get('/',  [ContactUsController::class,'index'])->name('ContactUs.index');
            Route::post('store',  [ContactUsController::class,'store'])->name('ContactUs.store');
            Route::get('delete/{id}', [ContactUsController::class,'destroy']) -> name('ContactUs.destroy');

        });

         ################################## delivery Policy ######################################
         Route::group(['prefix' => 'deliveryPolicy'], function () {
            Route::get('/',  [DeliveryPolicyController::class,'index'])->name('DeliveryPolicy.index');
            Route::get('create',  [DeliveryPolicyController::class,'create'])->name('DeliveryPolicy.create');
            Route::post('store',  [DeliveryPolicyController::class,'store'])->name('DeliveryPolicy.store');
            Route::get('edit/{id}',  [DeliveryPolicyController::class,'edit'])->name('DeliveryPolicy.edit');
            Route::post('update/{id}',  [DeliveryPolicyController::class,'update'])->name('DeliveryPolicy.update');
            Route::get('delete/{id}', [DeliveryPolicyController::class,'destroy']) -> name('DeliveryPolicy.destroy');

        });


             ///////////////roles Controller/////////////////////
             Route::group (['prefix'=>'ads'], function()
             {
                 Route::get('/'           , [AdController::class,'index'])->name('ads.index');
                 Route::get('create'      , [AdController::class,'create'])->name('ads.create');
                 Route::post('store'      , [AdController::class,'store'])->name('ads.store');
                 Route::get('edit/{id}'   , [AdController::class,'edit'])->name('ads.edit');
                 Route::post('update/{id}', [AdController::class,'update'])->name('ads.update');
                 Route::get('delete/{id}' , [AdController::class,'destroy'])->name('ads.destroy');

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
