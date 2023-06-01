<?php

namespace App\Providers;

use App\Models\Category;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductSetting;
use App\Models\Setting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Schema::defaultStringLength(191);

    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $collection = Setting::get();
        $setting = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        })->toArray();

        view()->share('face_book', $setting['facebook'] ?? null);
        view()->share('twitter', $setting['twitter'] ?? null);
        view()->share('instagram', $setting['instagram'] ?? null);
        view()->share('whatsapp', $setting['whatsapp'] ?? null);
///////////////////////////////////////////////////////////////////////////////////////////////////////

        $categories = Category::get();
        view()->share('categories', $categories ?? null);
////////////////////////////////////////////////////////////////////////////////////////////////////////
        View::composer('*', function ($view) {
            $name = ''; // Provide the default value for $name if needed
            $mainCategories = MainCategory::get();

            foreach ($mainCategories as $mainCategory) {
                $products = Product::where('mainCategory_id', $mainCategory->id)->get();

            }

            $view->with('mainCategories', $mainCategories)->with('products', $products);
        });

        /////////////////////////////////////////////////////////////////////////////////////////////

        View::composer('*', function ($view) {
            $name = ''; // Provide the default value for $name if needed
            $mainCategoriesSideBar = MainCategory::paginate(3);

            foreach ($mainCategoriesSideBar as $mainCategory) {
                $products = Product::where('mainCategory_id', $mainCategory->id)->get();

            }

            $view->with('mainCategoriesSideBar', $mainCategoriesSideBar)->with('products', $products);
        });
        /////////////////////////////////////////////////////////////////////////////////////////////


        View::composer('*', function ($view) {
            $productSetting = ProductSetting::first();

            $view->with('productSetting', $productSetting);
        });

    }
}
