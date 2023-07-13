<?php

use App\Http\Controllers\Admin\AboutusController;
use App\Http\Controllers\Admin\AdController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\ContactUsController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\DeliveryPolicyController;
use App\Http\Controllers\Admin\DeliveryPriceController;
use App\Http\Controllers\Admin\EmailUsController;
use App\Http\Controllers\Admin\ExchangeController;
use App\Http\Controllers\Admin\GovernorateController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\MainCategoryController;
use App\Http\Controllers\Admin\OrderController;
use App\Http\Controllers\Admin\privacyPolicyController;
use App\Http\Controllers\Admin\ProductColorController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\ProductSettingController;
use App\Http\Controllers\Admin\ProductSizeController;
use App\Http\Controllers\Admin\ProductSpecificationController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Admin\TermsController;
use App\Http\Controllers\Admin\VendorController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
 */

Route::group(['namespace' => 'Admin', 'middleware' => 'auth:admin', 'prefix' => 'admin'], function () {

    Route::get('/', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('logout', [LoginController::class, 'logout'])->name('admin.logout');
    ///////////////Admins Controller/////////////////////
    Route::group(['prefix' => 'admins'], function () {
        Route::get('/', [AdminController::class, 'index'])->name('admins.index');
        Route::get('create', [AdminController::class, 'create'])->name('admins.create');
        Route::post('store', [AdminController::class, 'store'])->name('admins.store');
        Route::get('edit/{id}', [AdminController::class, 'edit'])->name('admins.edit');
        Route::post('update/{id}', [AdminController::class, 'update'])->name('admins.update');
        Route::get('delete/{id}', [AdminController::class, 'destroy'])->name('admins.destroy');
    });
    ///////////////Brands Controller/////////////////////
    Route::group(['prefix' => 'brands'], function () {
        Route::get('/', [BrandController::class, 'index'])->name('brands.index');
        Route::get('create', [BrandController::class, 'create'])->name('brands.create');
        Route::post('store', [BrandController::class, 'store'])->name('brands.store');
        Route::get('edit/{id}', [BrandController::class, 'edit'])->name('brands.edit');
        Route::post('update/{id}', [BrandController::class, 'update'])->name('brands.update');
        Route::get('delete/{id}', [BrandController::class, 'destroy'])->name('brands.destroy');
    });

    ///////////////mainCategories Controller/////////////////////
    Route::group(['prefix' => 'mainCategories'], function () {
        Route::get('/', [MainCategoryController::class, 'index'])->name('mainCategories.index');
        Route::get('create', [MainCategoryController::class, 'create'])->name('mainCategories.create');
        Route::post('store', [MainCategoryController::class, 'store'])->name('mainCategories.store');
        Route::get('edit/{id}', [MainCategoryController::class, 'edit'])->name('mainCategories.edit');
        Route::post('update/{id}', [MainCategoryController::class, 'update'])->name('mainCategories.update');
        Route::get('delete/{id}', [MainCategoryController::class, 'destroy'])->name('mainCategories.destroy');
    });

    ///////////////categories Controller/////////////////////
    Route::group(['prefix' => 'categories'], function () {
        Route::get('/', [CategoryController::class, 'index'])->name('categories.index');
        Route::get('create', [CategoryController::class, 'create'])->name('categories.create');
        Route::post('store', [CategoryController::class, 'store'])->name('categories.store');
        Route::get('edit/{id}', [CategoryController::class, 'edit'])->name('categories.edit');
        Route::post('update/{id}', [CategoryController::class, 'update'])->name('categories.update');
        Route::get('delete/{id}', [CategoryController::class, 'destroy'])->name('categories.destroy');
    });
    ################################## products Controller ######################################
    Route::group(['prefix' => 'products'], function () {
        Route::get('/', [ProductController::class, 'index'])->name('products.index');
        Route::get('general-information', [ProductController::class, 'create'])->name('products.general.create');
        Route::post('store-general-information', [ProductController::class, 'store'])->name('products.general.store');
        Route::get('edit/{id}', [ProductController::class, 'edit'])->name('products.edit');
        Route::post('update/{id}', [ProductController::class, 'update'])->name('products.update');
        Route::post('delete/{id}', [ProductController::class, 'destroy'])->name('products.destroy');
    });
    ################################## product-Setting Controller ######################################
    Route::group(['prefix' => 'product-setting'], function () {
        Route::get('/', [ProductSettingController::class, 'index'])->name('productSetting.index');
        Route::get('/create', [ProductSettingController::class, 'create'])->name('productSetting.create');
        Route::post('/store', [ProductSettingController::class, 'store'])->name('productSetting.store');
        Route::get('/edit/{id}', [ProductSettingController::class, 'edit'])->name('productSetting.edit');
        Route::post('/update/{id}', [ProductSettingController::class, 'update'])->name('productSetting.update');
    });
    ################################## product-Specification Controller ######################################
    Route::group(['prefix' => 'product-Specification'], function () {
        Route::get('/create/{id}', [ProductSpecificationController::class, 'create'])->name('productSpecification.create');
        Route::post('/store/{id}', [ProductSpecificationController::class, 'store'])->name('productSpecification.store');
    });

    ///////////////colors Controller/////////////////////
    Route::group(['prefix' => 'colors'], function () {
        Route::get('/', [ProductColorController::class, 'index'])->name('colors.index');
        Route::get('create', [ProductColorController::class, 'create'])->name('colors.create');
        Route::post('store', [ProductColorController::class, 'store'])->name('colors.store');
        Route::get('edit/{id}', [ProductColorController::class, 'edit'])->name('colors.edit');
        Route::post('update/{id}', [ProductColorController::class, 'update'])->name('colors.update');
        Route::get('delete/{id}', [ProductColorController::class, 'destroy'])->name('colors.destroy');
    });

    ///////////////sizes Controller/////////////////////
    Route::group(['prefix' => 'sizes'], function () {
        Route::get('/', [ProductSizeController::class, 'index'])->name('sizes.index');
        Route::get('create', [ProductSizeController::class, 'create'])->name('sizes.create');
        Route::post('store', [ProductSizeController::class, 'store'])->name('sizes.store');
        Route::get('edit/{id}', [ProductSizeController::class, 'edit'])->name('sizes.edit');
        Route::post('update/{id}', [ProductSizeController::class, 'update'])->name('sizes.update');
        Route::get('delete/{id}', [ProductSizeController::class, 'destroy'])->name('sizes.destroy');
    });

    ################################## settings ######################################
    Route::group(['prefix' => 'settings'], function () {
        Route::get('/', [SettingController::class, 'index'])->name('settings.index');
        Route::post('update/{id}', [SettingController::class, 'update'])->name('settings.update');
    });

    ///////////////roles Controller/////////////////////
    Route::group(['prefix' => 'roles'], function () {
        Route::get('/', [RoleController::class, 'index'])->name('roles.index');
        Route::get('create', [RoleController::class, 'create'])->name('roles.create');
        Route::post('store', [RoleController::class, 'store'])->name('roles.store');
        Route::get('edit/{id}', [RoleController::class, 'edit'])->name('roles.edit');
        Route::post('update/{id}', [RoleController::class, 'update'])->name('roles.update');
        Route::get('delete/{id}', [RoleController::class, 'destroy'])->name('roles.destroy');
    });

    ################################## profile ######################################
    Route::group(['prefix' => 'profiles'], function () {
        Route::get('edit/{id}', [AdminProfileController::class, 'edit'])->name('adminsProfile.edit');
        Route::post('update/{id}', [AdminProfileController::class, 'update'])->name('adminsProfile.update');
    });

    ################################## delivery options ######################################
    Route::group(['prefix' => 'vendors'], function () {
        Route::get('/', [VendorController::class, 'index'])->name('vendors.index');
        Route::get('create', [VendorController::class, 'create'])->name('vendors.create');
        Route::post('store', [VendorController::class, 'store'])->name('vendors.store');
        Route::get('edit/{id}', [VendorController::class, 'edit'])->name('vendors.edit');
        Route::post('update/{id}', [VendorController::class, 'update'])->name('vendors.update');
        Route::get('delete/{id}', [VendorController::class, 'destroy'])->name('vendors.destroy');
    });
    ################################## Contact Us ######################################
    Route::group(['prefix' => 'ContactUs'], function () {
        Route::get('/', [ContactUsController::class, 'index'])->name('ContactUs.index');
        // Route::post('store', [ContactUsController::class, 'store'])->name('ContactUs.store');
        Route::get('delete/{id}', [ContactUsController::class, 'destroy'])->name('ContactUs.destroy');
    });

    ################################## delivery Policy ######################################
    Route::group(['prefix' => 'deliveryPolicy'], function () {
        Route::get('/', [DeliveryPolicyController::class, 'index'])->name('DeliveryPolicy.index');
        Route::get('create', [DeliveryPolicyController::class, 'create'])->name('DeliveryPolicy.create');
        Route::post('store', [DeliveryPolicyController::class, 'store'])->name('DeliveryPolicy.store');
        Route::get('edit/{id}', [DeliveryPolicyController::class, 'edit'])->name('DeliveryPolicy.edit');
        Route::post('update/{id}', [DeliveryPolicyController::class, 'update'])->name('DeliveryPolicy.update');
        Route::get('delete/{id}', [DeliveryPolicyController::class, 'destroy'])->name('DeliveryPolicy.destroy');
    });

    ///////////////ads Controller/////////////////////
    Route::group(['prefix' => 'ads'], function () {
        Route::get('/', [AdController::class, 'index'])->name('ads.index');
        Route::get('create', [AdController::class, 'create'])->name('ads.create');
        Route::post('store', [AdController::class, 'store'])->name('ads.store');
        Route::get('edit/{id}', [AdController::class, 'edit'])->name('ads.edit');
        Route::post('update/{id}', [AdController::class, 'update'])->name('ads.update');
        Route::get('delete/{id}', [AdController::class, 'destroy'])->name('ads.destroy');
    });

    ################################## Contact Us ######################################
    Route::group(['prefix' => 'emailUs'], function () {
        Route::get('/', [EmailUsController::class, 'index'])->name('emailUs.index');
        Route::get('delete/{id}', [EmailUsController::class, 'destroy'])->name('emailUs.destroy');
    });

    ///////////////terms Controller/////////////////////
    Route::group(['prefix' => 'Terms-Conditions'], function () {
        Route::get('/', [TermsController::class, 'index'])->name('terms.index');
        Route::get('create', [TermsController::class, 'create'])->name('terms.create');
        Route::post('store', [TermsController::class, 'store'])->name('terms.store');
        Route::get('edit/{id}', [TermsController::class, 'edit'])->name('terms.edit');
        Route::post('update/{id}', [TermsController::class, 'update'])->name('terms.update');
        Route::get('delete/{id}', [TermsController::class, 'destroy'])->name('terms.destroy');
    });

    ///////////////governorates Controller/////////////////////
    Route::group(['prefix' => 'Governorates'], function () {
        Route::get('/', [GovernorateController::class, 'index'])->name('governorate.index');
        Route::get('create', [GovernorateController::class, 'create'])->name('governorate.create');
        Route::post('store', [GovernorateController::class, 'store'])->name('governorate.store');
        Route::get('edit/{id}', [GovernorateController::class, 'edit'])->name('governorate.edit');
        Route::post('update/{id}', [GovernorateController::class, 'update'])->name('governorate.update');
        Route::get('delete/{id}', [GovernorateController::class, 'destroy'])->name('governorate.destroy');
    });
    ///////////////sizes Controller/////////////////////
    Route::group(['prefix' => 'Sizes-table'], function () {
        Route::get('/', [SizeController::class, 'index'])->name('size.index');
        Route::get('create', [SizeController::class, 'create'])->name('size.create');
        Route::post('store', [SizeController::class, 'store'])->name('size.store');
        Route::get('edit/{id}', [SizeController::class, 'edit'])->name('size.edit');
        Route::post('update/{id}', [SizeController::class, 'update'])->name('size.update');
        Route::get('delete/{id}', [SizeController::class, 'destroy'])->name('size.destroy');
    });

    ///////////////coupon Controller/////////////////////
    Route::group(['prefix' => 'Coupon'], function () {
        Route::get('/', [CouponController::class, 'index'])->name('coupon.index');
        Route::get('create', [CouponController::class, 'create'])->name('coupon.create');
        Route::post('store', [CouponController::class, 'store'])->name('coupon.store');
        Route::get('edit/{id}', [CouponController::class, 'edit'])->name('coupon.edit');
        Route::post('update/{id}', [CouponController::class, 'update'])->name('coupon.update');
        Route::get('delete/{id}', [CouponController::class, 'destroy'])->name('coupon.destroy');
    });

    ///////////////Orders Controller/////////////////////
    Route::group(['prefix' => 'Order'], function () {
        Route::get('/', [OrderController::class, 'index'])->name('order.index');
        Route::get('edit/{id}', [OrderController::class, 'edit'])->name('order.edit');
        Route::post('update/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::get('delete/{id}', [OrderController::class, 'destroy'])->name('order.destroy');
    });
    ///////////////Exchnge Controller/////////////////////
    Route::group(['prefix' => 'Exchnge'], function () {
        Route::get('/', [ExchangeController::class, 'index'])->name('exchanges.index');
        Route::get('show/{id}', [ExchangeController::class, 'show'])->name('exchanges.show');
        // Route::post('update/{id}', [OrderController::class, 'update'])->name('order.update');
        Route::get('delete/{id}', [ExchangeController::class, 'destroy'])->name('exchanges.destroy');
    });

    ///////////////Delivery-price Controller/////////////////////
    Route::group(['prefix' => 'Delivery-price'], function () {
        Route::get('/', [DeliveryPriceController::class, 'index'])->name('deliveryPrice.index');
        Route::get('create', [DeliveryPriceController::class, 'create'])->name('deliveryPrice.create');
        Route::post('store', [DeliveryPriceController::class, 'store'])->name('deliveryPrice.store');
        Route::get('edit/{id}', [DeliveryPriceController::class, 'edit'])->name('deliveryPrice.edit');
        Route::post('update/{id}', [DeliveryPriceController::class, 'update'])->name('deliveryPrice.update');
        Route::get('delete/{id}', [DeliveryPriceController::class, 'destroy'])->name('deliveryPrice.destroy');
    });

    ///////////////privacy-policy Controller/////////////////////
    Route::group(['prefix' => 'privacy-policy'], function () {
        Route::get('/', [privacyPolicyController::class, 'index'])->name('privacyPolicy.index');
        Route::get('create', [privacyPolicyController::class, 'create'])->name('privacyPolicy.create');
        Route::post('store', [privacyPolicyController::class, 'store'])->name('privacyPolicy.store');
        Route::get('edit/{id}', [privacyPolicyController::class, 'edit'])->name('privacyPolicy.edit');
        Route::post('update/{id}', [privacyPolicyController::class, 'update'])->name('privacyPolicy.update');
        Route::get('delete/{id}', [privacyPolicyController::class, 'destroy'])->name('privacyPolicy.destroy');
    });

    ///////////////AboutUs Controller/////////////////////
    Route::group(['prefix' => 'AboutUs'], function () {
        Route::get('/', [AboutusController::class, 'index'])->name('about_us.index');
        Route::get('create', [AboutusController::class, 'create'])->name('about_us.create');
        Route::post('store', [AboutusController::class, 'store'])->name('about_us.store');
        Route::get('edit/{id}', [AboutusController::class, 'edit'])->name('about_us.edit');
        Route::post('update/{id}', [AboutusController::class, 'update'])->name('about_us.update');
        Route::get('delete/{id}', [AboutusController::class, 'destroy'])->name('about_us.destroy');
    });

}); // routes for authenticated admins

Route::group(['namespace' => 'Admin', 'middleware' => 'guest:admin', 'prefix' => 'admin'], function () {

    //login
    Route::get('login', [LoginController::class, 'login'])->name('admin.login');
    Route::post('login', [LoginController::class, 'postlogin'])->name('admin.post.login');

    //forget and reset password
    Route::post('forget-password', [LoginController::class, 'submitForgetPasswordForm'])->name('admin.forget.password.post');
    Route::get('reset-password/{token}', [LoginController::class, 'showResetPasswordForm'])->name('admin.reset.password.get');
    Route::post('reset-password', [LoginController::class, 'submitResetPasswordForm'])->name('admin.reset.password.post');
}); // routes for un-authenticated admins
