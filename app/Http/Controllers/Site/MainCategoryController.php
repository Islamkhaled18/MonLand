<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\MainCategory;
use App\Models\Product;

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

        $mainCategory = MainCategory::where('name', $name)->first();
        $mainCategoryProducts =  Product::where('mainCategory_id',$mainCategory->id)->get();

        $products_count = Product::where('mainCategory_id',$mainCategory->id)->count();


        return view('site.mainCategory.products', compact('mainCategory', 'mainCategoryProducts', 'banners',
            'all_offers','weekend_offers','buy_your_mind_is_frees','products_count'
            ,'electronics_products_photos', 'brand_slide'));
    }
}
