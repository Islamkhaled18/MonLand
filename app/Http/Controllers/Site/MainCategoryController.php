<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use Illuminate\Http\Request;

class MainCategoryController extends Controller
{
    public function categoryProducts($name)
    {
        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();
        // $mainCategoryProducts =  Product::where('mainCategory_id',$mainCategory->id)->get();
        if ($mainCategory) {

            $mainCategoryProducts = $mainCategory->products()->paginate(12);

            $mainCategoryProductsCount = $mainCategory->products->count();
        }

        return view('site.mainCategory.products', compact('mainCategory', 'mainCategoryProducts', 'banners',
            'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'mainCategoryProductsCount', 'productColors', 'productSizes'
            , 'electronics_products_photos', 'brand_slide'));
    }

    public function search_products_by_created_at(Request $request, $name)
    {

        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {

            $mainCategoryProducts = $mainCategory->products()
                ->orderBy("created_at", "desc")
                ->paginate(12);
            $mainCategoryProductsCount = $mainCategory->products->count();

        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount'))->render();
    }

    public function get_all_products(Request $request, $name)
    {
        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {

            $mainCategoryProducts = $mainCategory->products()->paginate(4);
            $mainCategoryProductsCount = $mainCategory->products->count();

        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount'))->render();
    }

    public function get_flash_products(Request $request, $name)
    {

        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {
            $mainCategoryProducts = $mainCategory->products()
                ->where('flash_sale', 1)
                ->paginate(12);
            $mainCategoryProductsCount = $mainCategory->products->count();
        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount'))->render();
    }

    public function search_products_by_price(Request $request, $name)
    {

        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {
            $query = $mainCategory->products();

            if ($request->has('minPrice')) {
                $minPrice = $request->input('minPrice');
                $query->where('new_price', '>=', $minPrice);
            }

            if ($request->has('maxPrice')) {
                $maxPrice = $request->input('maxPrice');
                $query->where('new_price', '<=', $maxPrice);
            }

            $mainCategoryProducts = $query->paginate(12);
            $mainCategoryProductsCount = $mainCategoryProducts->count();
        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount'))->render();
    }

    public function search_by_color(Request $request, $name)
    {
        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();
        $productSizes = Productsize::distinct()->get(['name']);

        $productColors = ProductColor::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {

            $colors = ProductColor::where("name", $request->color)->pluck('product_id')->toArray();

            $colorsArr = array_values($colors);

            $mainCategoryProducts = $mainCategory->products()->whereIN("id", $colorsArr)->paginate(12);
            $mainCategoryProductsCount = $mainCategory->products->count();
        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount', 'colors',
            'colorsArr'))->render();

    }

    public function search_by_size(Request $request, $name)
    {
        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();
        $productSizes = Productsize::distinct()->get(['name']);

        $productColors = ProductColor::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        if ($mainCategory) {

            $sizes = Productsize::where('name', $request->size)->pluck('product_id')->toArray();

            $mainCategoryProducts = $mainCategory->products()->whereIN("id", $sizes)->paginate(12);
            $mainCategoryProductsCount = $mainCategory->products->count();

        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount', 'sizes'))->render();

    }

    public function get_products_ByBrands(Request $request, $name)
    {
        $banners = Ad::select('image')->take(3)->get();
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(12);
        $brand_slide = Brand::select('image')->first();
        $all_offers = Ad::select('image')->take(3)->get();
        $weekend_offers = Ad::select('image')->skip(3)->take(2)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(5)->take(2)->get();

        $productColors = ProductColor::distinct()->get(['name']);
        $productSizes = Productsize::distinct()->get(['name']);

        $mainCategory = MainCategory::where('name', $name)->first();

        $brand = $request->brand; //brand

        if ($mainCategory && $brand) {
            $mainCategoryProducts = $mainCategory->products()->whereIN('brand_id', explode(',', $brand))->paginate(12);
            $mainCategoryProductsCount = $mainCategory->products->count();
        }

        return view('site.mainCategory.products', compact('banners', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees', 'electronics_products_photos', 'brand_slide', 'productColors', 'productSizes', 'mainCategory', 'mainCategoryProducts',
            'mainCategoryProductsCount', 'brand'))->render();}

}
