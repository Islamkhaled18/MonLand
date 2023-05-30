<?php

namespace App\Providers;

use App\Http\Controllers\Site\MainCategoryController;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\MainCategory;

class CategoryProductsServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('*', function ($view) {
        //     $name = '';

        //     $mainCategoryController = app()->make(MainCategoryController::class);
        //     $allCategories = $mainCategoryController->categoryProducts($name);

        //     $view->with('allCategories', $allCategories);
        // });


        // View::composer('site.mainCategory.products', function ($view) {
        //     $name = ''; // Provide the default value for $name if needed
        //     $mainCategories = MainCategory::where('name', $name)
        //         ->with('products')
        //         ->get();
        //     $view->with('mainCategories', $mainCategories);
        // });
    }
}
