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
use App\Http\Controllers\Site\ExchangeController;
use App\Http\Controllers\Site\MainCategoryController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\ProfileController;
use App\Http\Controllers\Site\TermsConditionController;
use App\Http\Controllers\Site\VendorController;
use App\Http\Controllers\Site\WishlistController;
use App\Mail\PasswordResetEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
 */

Route::get('/', [HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/sizes', [ProductController::class, 'sizeTable'])->name('sizeTable');

Route::get('/home', [HomeController::class, 'index'])->name('home');

Route::get('social/{provider}', [SocialAuthController::class, "redirect"])->name('auth.provider.redirect');

Route::get('social/{provider}/callback', [SocialAuthController::class, "callBack"]);

Route::group(['prefix' => 'emailUs'], function () {
    Route::post('store', [EmailUsController::class, 'store'])->name('emailUs.store');
});

Route::group(['prefix' => 'Site/DeliveryPolicy'], function () {
    Route::get('/', [DeliveryPolicyController::class, 'index'])->name('site.DeliveryPolicy.index');
});
Route::group(['prefix' => 'Site/Terms-Conditions'], function () {
    Route::get('/', [TermsConditionController::class, 'index'])->name('site.terms.index');
});

Route::group(['namespace' => 'Site', 'middleware' => 'auth:web', 'prefix' => 'Site'], function () {

    Route::get('search', [ProductController::class, 'search'])->name('site.search');

    //contact us
    Route::get('contactUs', [ContactUsController::class, 'index'])->name('Site.contactUs');
    Route::post('store', [ContactUsController::class, 'store'])->name('Site.ContactUs.store');

    ////////////////////////////////profile //////////////////////////////////////////////////////
    Route::get('profile/{firstName}', [ProfileController::class, 'getProfile'])->name('site.profile');
    Route::post('updateprofile/{id}', [ProfileController::class, 'updateProfile'])->name('site.profile.update');
    Route::post('updateprofilePassword/{id}', [ProfileController::class, 'updateprofilePassword'])->name('site.profile.password.update');
    Route::get('/cities/{id}', [ProfileController::class, 'getcity'])->name('city');
    Route::get('profile/Add-Address/{id}', [ProfileController::class, 'addAddress'])->name('site.profile.address');
    Route::post('profile/Store-Address/{id}', [ProfileController::class, 'storeAddress'])->name('site.profile.storeAddress');
    Route::post('/profile/set-default-address', [ProfileController::class, 'setDefaultAddress'])->name('site.profile.setDefaultAddress');
    Route::get('profile/delete/{id}', [ProfileController::class, 'destroyAddress'])->name('site.profile.destroyAddress');
    ////////////////////////////////profile //////////////////////////////////////////////////////

    ///////////////Checkout Controller/////////////////////
    Route::group(['prefix' => 'Checkout'], function () {
        Route::get('/', [CartController::class, 'orders'])->name('cart.orders');
        Route::post('Checkout', [CartController::class, 'checkout'])->name('site.checkout.store');
        Route::post('order', [CartController::class, 'updateOrder'])->name('checkout.updateOrder');
        Route::get('order/{id}', [CartController::class, 'showOrder'])->name('order.show');
    });

    ///////////////Exchange Controller/////////////////////
    Route::group(['prefix' => 'Exchange'], function () {
        Route::get('/', [ExchangeController::class, 'create'])->name('exchange.create');
        Route::post('store', [ExchangeController::class, 'store'])->name('site.exchange.store');
    });
    ///////////////Review Controller/////////////////////
    Route::group(['prefix' => 'Review'], function () {
        Route::post('store', [CartController::class, 'reviewstore'])->name('review.store');
    });
}); // routes for authenticated users

Route::group(['namespace' => 'Site', 'prefix' => 'Site'], function () {

    //all categories
    Route::get('AllCategories', [CategoryController::class, 'allCategory'])->name('Site.allCategory');
    // products belongs to main categories
    Route::get('/mainCategory/{name}/products', [MainCategoryController::class, 'categoryProducts'])->name('mainCategory.products');

    //categories & products
    Route::get('category/{name}', [CategoryController::class, 'categoryProducts'])->name('Site.category');
    //صفحة تفاصيل المنتج
    Route::get('product/{name}', [ProductController::class, 'productByName'])->name('Site.product');

    //filter in categories products
    Route::get('category/{name}/search-products', [CategoryController::class, 'search_products_by_price'])->name('search.products');
    Route::get('category/{name}/sort-products', [CategoryController::class, 'search_products_by_created_at'])->name('sort.products');
    Route::get('category/{name}/all-products', [CategoryController::class, 'get_all_products'])->name('all_products.search');
    Route::get('category/{name}/flash-products', [CategoryController::class, 'get_flash_products'])->name('all_offers.search');
    Route::get('category/{name}/brands-products', [CategoryController::class, 'get_products_ByBrands'])->name('brands.sort');
    Route::get('category/{name}/colors-products', [CategoryController::class, 'search_by_color'])->name('search.color');
    Route::get('category/{name}/sizes-products', [CategoryController::class, 'search_by_size'])->name('search.size');
    Route::get('category/{name}/review-products', [CategoryController::class, 'search_by_review_products'])->name('search.review.product');

    //filter in main categories products
    Route::get('mainCategory/{name}/sort-products', [MainCategoryController::class, 'search_products_by_created_at'])->name('mainCategory.sort.products');
    Route::get('mainCategory/{name}/all-products', [MainCategoryController::class, 'get_all_products'])->name('mainCategory.all_products.search');
    Route::get('mainCategory/{name}/flash-products', [MainCategoryController::class, 'get_flash_products'])->name('mainCategory.all_offers.search');
    Route::get('mainCategory/{name}/search-products', [MainCategoryController::class, 'search_products_by_price'])->name('mainCategory.search.products');
    Route::get('mainCategory/{name}/brands-products', [MainCategoryController::class, 'get_products_ByBrands'])->name('mainCategory.brands.sort');
    Route::get('mainCategory/{name}/colors-products', [MainCategoryController::class, 'search_by_color'])->name('mainCategory.search.color');
    Route::get('mainCategory/{name}/sizes-products', [MainCategoryController::class, 'search_by_size'])->name('mainCategory.search.size');

    Route::get('mainCategory/{name}/review-products', [MainCategoryController::class, 'search_by_review_products'])->name('mainCategory.search.review.product');

    //wishlist
    Route::get('wishlist/products', [WishlistController::class, 'index'])->name('wishlist.products.index');
    Route::post('wishlist', [WishlistController::class, 'store'])->name('wishlist.store');
    Route::delete('/wishlist', [WishlistController::class, 'destroy'])
        ->name('wishlist.destroy');

    //compare
    Route::get('compare/products', [CompareController::class, 'index'])->name('compare.products.index');
    Route::post('compare', [CompareController::class, 'store'])->name('compare.store');
    Route::delete('compare', [CompareController::class, 'destroy'])->name('compare.destroy');

    ///////////////cart Controller/////////////////////
    Route::group(['prefix' => 'cart'], function () {
        Route::get('/', [CartController::class, 'index'])->name('cart.index');
        Route::post('store', [CartController::class, 'store'])->name('site.cart.store');
        Route::get('delete/{id}', [CartController::class, 'destroy'])->name('cart.destroy');
        Route::post('update_cart', [CartController::class, 'update_cart'])->name('cart.update'); //update product in cart list
        Route::get('count-cart-prod', [CartController::class, 'countCart'])->name('cart.countCart');

        /////////////////////////////////////// coupon //////////////////////////////////////////
        Route::post('/coupon', [CouponController::class, 'store'])->name('site.coupon.store');
        Route::delete('/coupon', [CouponController::class, 'destroy'])->name('site.coupon.destroy');
    });

    //vendors
    Route::get('product/vendor/{id}', [VendorController::class, 'vendorProducts'])->name('Site.product.vendorProducts');
    Route::get('product/vendor/{id}/sort-products', [VendorController::class, 'search_products_by_created_at'])->name('Site.vendor.sort.products');
    Route::get('product/vendor/{id}/price-products', [VendorController::class, 'search_products_by_price'])->name('Site.vendor.price.products');
    Route::get('product/vendor/{id}/all-products', [VendorController::class, 'get_all_products'])->name('Site.vendor.all_products.search');
    Route::get('product/vendor/{id}/flash-products', [VendorController::class, 'get_flash_products'])->name('Site.vendor.all_offers.search');
    Route::get('product/vendor/{id}/brands-products', [VendorController::class, 'get_products_ByBrands'])->name('Site.vendor.brands.sort');
    Route::get('product/vendor/{id}/colors-products', [VendorController::class, 'search_by_color'])->name('Site.vendor.search.color');
    Route::get('product/vendor/{id}/sizes-products', [VendorController::class, 'search_by_size'])->name('Site.vendor.search.size');
    Route::get('product/vendor/{id}/review-products', [VendorController::class, 'search_by_review_products'])->name('Site.vendor.search.review');

    Route::get('vendor/{id}', [VendorController::class, 'getVendor'])->name('Site.vendor.getVendor');

    Route::get('reset-passord', function () {
        return view('auth.passwords.email');
    })->name('password.email.send');

    Route::post('/forgot-password', function (Request $request) {
        $request->validate([
            'email' => 'required|email|exists:users,email',
        ]);

        $user = App\Models\User::where('email', $request->email)->first();

        if ($user) {
            $verificationCode = rand(10000, 99999);
            $user->verification_code = $verificationCode;
            $user->save();

            Mail::to($user->email)->send(new PasswordResetEmail($verificationCode));
        }

        return redirect()->route('password.verify', ['email' => $request->email]);
    })->name('password.email');

    // Route::get('/reset-password', function (Request $request) {
    //     return view('auth.passwords.reset-password', ['email' => $request->email]);
    // })->name('password.verify');

    Route::get('/reset-password', function (Request $request) {
        $email = $request->query('email');
        $user = App\Models\User::where('email', $email)->first();
        return view('auth.passwords.reset-password', ['user' => $user]);
    })->name('password.verify');

    Route::post('/reset-password', function (Request $request) {

        $request->validate([
            'verification_code.*' => 'required|numeric',
            'password' => 'required|min:6',
            'email' => 'required|email',
        ]);

        // Combine the verification code digits into a single string
        $verificationCode = implode('', $request->input('verification_code'));

        $user = App\Models\User::where('email', $request->input('email'))
            ->where('verification_code', $verificationCode)
            ->first();

        if ($user) {
            $user->password = bcrypt($request->password);
            $user->verification_code = null;
            $user->save();

            return redirect()->route('password.success', ['newPassword' => $request->password]);
        }

        return redirect()->back()->withErrors(['verification_code' => 'Invalid verification code.']);
    })->name('password.update');

    Route::get('/password-reset-success', function (Request $request) {
        return view('auth.passwords.password-reset-success', ['newPassword' => $request->newPassword]);
    })->name('password.success');

}); // routes for un-authenticated users
