<?php

use App\Http\Controllers\Admin\EmailUsController;
use App\Http\Controllers\Auth\SocialAuthController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Site\CartController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\CompareController;
use App\Http\Controllers\Site\ContactUsController;
use App\Http\Controllers\Site\CouponController;
use App\Http\Controllers\Site\DeliveryPolicyController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\WishlistController;
use App\Http\Controllers\Site\ExchangeController;
use App\Http\Controllers\Site\TermsConditionController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('social/{provider}' , [SocialAuthController::class , "redirect"])->name('auth.provider.redirect');

Route::get('social/{provider}/callback' , [SocialAuthController::class , "callBack"]);

Route::group(['prefix' => 'emailUs'], function () {
    Route::post('store',  [EmailUsController::class, 'store'])->name('emailUs.store');
});

Route::group(['prefix' => 'Site/DeliveryPolicy'], function () {
    Route::get('/',  [DeliveryPolicyController::class, 'index'])->name('site.DeliveryPolicy.index');
});
Route::group(['prefix' => 'Site/Terms-Conditions'], function () {
    Route::get('/',  [TermsConditionController::class, 'index'])->name('site.terms.index');
});

Route::group(['namespace' => 'Site', 'middleware' => 'auth:web', 'prefix' => 'Site'], function () {

    //contact us
    Route::get('contactUs', [ContactUsController::class, 'index'])->name('Site.contactUs');

    //categories & products
    Route::get('AllCategories', [CategoryController::class, 'allCategory'])->name('Site.allCategory');
    Route::get('category/{name}', [CategoryController::class, 'categoryProducts'])->name('Site.category');
    Route::get('product/{name}', [ProductController::class, 'productByName'])->name('Site.product');

    Route::get('category/{name}/search-products', [CategoryController::class, 'search_products_by_price'])->name('search.products');
    Route::get('category/{name}/sort-products', [CategoryController::class, 'search_products_by_created_at'])->name('sort.products');

    Route::get('category/{name}/all-products', [CategoryController::class, 'get_all_products'])->name('all_products.search');
    Route::get('category/{name}/flash-products', [CategoryController::class, 'get_flash_products'])->name('all_offers.search');
    Route::get('category/{name}/brands-products', [CategoryController::class, 'get_products_ByBrands'])->name('brands.sort');
    Route::get('category/{name}/colors-products' , [CategoryController::class , 'search_by_color'])->name('search.color');
    Route::get('category/{name}/sizes-products' , [CategoryController::class , 'search_by_size'])->name('search.size');
    Route::get('category/{name}/review-products' , [CategoryController::class , 'search_by_review_products'])->name('search.review.product');

    //vendors
    Route::get('product/vendor/{id}', [ProductController::class, 'vendorProducts'])->name('Site.product.vendorProducts');

    Route::get('product/vendor/{id}/price-products', [ProductController::class, 'search_products_by_price'])->name('Site.vendor.price.products');
    
    Route::get('product/vendor/{id}/sort-products', [ProductController::class, 'search_products_by_created_at'])->name('Site.vendor.sort.products');

    Route::get('product/vendor/{id}/all-products', [ProductController::class, 'get_all_products'])->name('Site.vendor.all_products.search');
    Route::get('product/vendor/{id}/flash-products', [ProductController::class, 'get_flash_products'])->name('Site.vendor.all_offers.search');
    Route::get('product/vendor/{id}/brands-products', [ProductController::class, 'get_products_ByBrands'])->name('Site.vendor.brands.sort');
    Route::get('product/vendor/{id}/colors-products', [ProductController::class, 'search_by_color'])->name('Site.vendor.search.color');
    Route::get('product/vendor/{id}/sizes-products', [ProductController::class, 'search_by_size'])->name('Site.vendor.search.size');
    Route::get('product/vendor/{id}/review-products', [ProductController::class, 'search_by_review_products'])->name('Site.vendor.search.review');


    Route::get('vendor/{id}', [ProductController::class, 'getVendor'])->name('Site.getVendor');

    //profile
    Route::get('profile/{id}', [ProfileController::class, 'getProfile'])->name('site.profile');
    Route::post('updateprofile/{id}', [ProfileController::class, 'updateprofile'])->name('site.profile.update');
    Route::post('updateprofilePassword/{id}', [ProfileController::class, 'updateprofilePassword'])->name('site.profile.password.update');
    Route::get('profile/Add-Address/{id}', [ProfileController::class, 'addAddress'])->name('site.profile.address');

    Route::get('/cities/{id}', [ProfileController::class, 'getcity'])->name('city');


    Route::post('profile/Store-Address/{id}', [ProfileController::class, 'storeAddress'])->name('site.profile.storeAddress');
    Route::get('profile/delete/{id}', [ProfileController::class, 'destroyAddress'])->name('site.profile.destroyAddress');

    //wishlist
    Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.products.index');
    Route::post('wishlist',  [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('wishlist',  [WishlistController::class, 'destroy'])->name('wishlist.destroy');
    Route::get('count-fav-prod',  [WishlistController::class, 'countFav'])->name('wishlist.countFav');

    //compare
    Route::get('compare/products', [CompareController::class, 'index'])->name('compare.products.index');
    Route::post('compare',  [CompareController::class, 'store'])->name('compare.store');
    Route::delete('compare',  [CompareController::class, 'destroy'])->name('compare.destroy');

    ///////////////cart Controller/////////////////////
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('store', [CartController::class, 'store'])->name('cart.store');
        Route::get('delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::post('update_cart', [CartController::class, 'update_cart'])->name('cart.update'); //upate product in cart list
        Route::get('count-cart-prod',  [CartController::class, 'countCart'])->name('cart.countCart');

        /////////////////////////////////////// coupon //////////////////////////////////////////
        Route::post('/coupon', [CouponController::class, 'store'])->name('site.coupon.store');
        Route::delete('/coupon', [CouponController::class, 'destroy'])->name('site.coupon.destroy');
    });
    ///////////////Checkout Controller/////////////////////
    Route::group(['prefix' => 'Checkout'], function () {
        Route::get('/', [CartController::class, 'orders'])->name('cart.orders');
        Route::post('Checkout', [CartController::class, 'checkout'])->name('checkout.store');
        Route::post('order', [CartController::class, 'updateOrder'])->name('checkout.updateOrder');
        Route::get('order/{id}', [CartController::class, 'showOrder'])->name('order.show');
    });


    ///////////////Exchange Controller/////////////////////
    Route::group(['prefix' => 'Exchange'], function () {
        Route::get('/', [ExchangeController::class, 'create'])->name('exchange.create');
        Route::post('store', [ExchangeController::class, 'store'])->name('exchange.store');
    });
    ///////////////Review Controller/////////////////////
    Route::group(['prefix' => 'Review'], function () {
        Route::post('store', [CartController::class, 'reviewstore'])->name('review.store');
    });
}); // routes for authenticated users

Route::group(['namespace' => 'Site', 'middleware' => 'guest:web', 'prefix' => 'Site'], function () {
}); // routes for un-authenticated users
