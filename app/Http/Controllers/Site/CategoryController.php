<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $allCategories = Category::parent()->select('id', 'name')->with(['childrens' => function ($q) {
            $q->select('id', 'parent_id', 'name');
            $q->with(['childrens' => function ($qq) {
                $qq->select('id', 'parent_id', 'name');
            }]);
        }])->get();

        return view('site.categories.allCategories', compact('allCategories'));
    }

    public function categoryProducts($name)
    {
        $category = Category::where('name', $name)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        if ($category) {

            $categoryProducts = $category->products()->paginate(12);
            $categoryProductsCount = $category->products->count();
        }

        return view('site.categories.products', compact('category', 'categoryProductsCount', 'productColors', 'productSizes', 'categoryProducts'));
    }

    public function search_products_by_created_at(Request $request, $name)
    {
        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);


        $category = Category::where('name', $name)->first();

        if ($category) {

            $categoryProducts = $category->products()
                ->orderBy("created_at", "desc")
                ->paginate(12);
            $categoryProductsCount = $category->products->count();

        }

        return view('site.categories.products', compact('categoryProducts', 'categoryProductsCount', 'category','productColors','productSizes'))->render();
    }

    public function get_all_products(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {

            $categoryProducts = $category->products()->paginate(4);
            $categoryProductsCount = $category->products->count();

        }

        return view('site.categories.products', compact('category', 'categoryProducts', 'categoryProductsCount'))->render();
    }

    public function get_flash_products(Request $request, $name)
    {

        $category = Category::where('name', $name)->first();

        if ($category) {

            $categoryProducts = $category->products()
                ->where('flash_sale', 1)
                ->paginate(12);
            $categoryProductsCount = $category->products->count();

        }

        return view('site.categories.products', compact('categoryProducts', 'category', 'categoryProductsCount'))->render();
    }

    public function search_products_by_price(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $query = $category->products();

            if ($request->has('minPrice')) {
                $minPrice = $request->input('minPrice');
                $query->where('new_price', '>=', $minPrice);
            }

            if ($request->has('maxPrice')) {
                $maxPrice = $request->input('maxPrice');
                $query->where('new_price', '<=', $maxPrice);
            }

            $categoryProducts = $query->paginate(12);
            $categoryProductsCount = $categoryProducts->count();
        }

        return view('site.categories.products', compact('categoryProducts', 'category', 'categoryProductsCount'))->render();
    }

    public function search_by_color(Request $request, $name)
    {
        $productColors = ProductColor::distinct()->get(['name']);

        $category = Category::where('name', $name)->first();

        if ($category) {
            $colors = ProductColor::where("name", $request->color)->pluck('product_id')->toArray();

            $colorsArr = array_values($colors);

            $categoryProducts = $category->products()->whereIN("id", $colorsArr)->paginate(12);
            $categoryProductsCount = $category->products->count();

        }

        return view('site.categories.products', compact('categoryProductsCount', 'colorsArr', 'category', 'categoryProducts', 'productColors', 'colors'))->render();

    }


    public function search_by_size(Request $request, $name)
    {
        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $category = Category::where('name', $name)->first();

        if ($category) {
            $sizes = Productsize::where('name', $request->size)->pluck('product_id')->toArray();

            $categoryProducts = $category->products()->whereIN("id", $sizes)->paginate(12);
            $categoryProductsCount = $category->products->count();

        }

        return view('site.categories.products', compact('productSizes', 'productColors', 'category', 'sizes', 'categoryProducts', 'categoryProductsCount'))->render();

    }

    public function get_products_ByBrands(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        $brand = $request->brand; //brand

        if ($category && $brand) {
            $categoryProducts = $category->products()->whereIN('brand_id', explode(',', $brand))->paginate(12);
            $categoryProductsCount = $category->products->count();
        }

        return view('site.categories.products', compact('categoryProducts', 'category', 'categoryProductsCount'))->render();
    }

    public function search_by_review_products(Request $request, $name)
    {

        $category = Category::where('name', $name)->first();

        $reviews = Review::where("star_rating", $request->rating)->pluck('product_id')->toArray();

        if ($category) {

            $products = Product::where("mainCategory_id", $category->id)
                ->whereIN("id", $reviews)->paginate(4);

        }

        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();

    }

}
