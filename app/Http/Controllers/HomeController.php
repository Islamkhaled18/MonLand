<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
/////////////////////////////////////////////////////////////////////////////////////////////
        // $cacheKey = 'random_brand_slides';

        // // Check if we have cached images
        // if (Cache::has($cacheKey)) {
        //     $brand_slides = Cache::get($cacheKey);
        // } else {
        //     // No cached images, so select a new set of random images
        //     $brand_slides = Brand::inRandomOrder()->limit(4)->pluck('image');

        //     // Cache the new images for 3 days
        //     Cache::put($cacheKey, $brand_slides, 60 * 24 * 3);
        // }
        // عشان لو عاوز اجيب صور من الداتا بيز ولو عاوز اغيرها كل 3 ايام

/////////////////////////////////////////////////////////////////////////////////////////////
        $brand_slides = Brand::select('image')->take(3)->get();
        $category_slides = Category::select('name', 'image')->limit(7)->get();
        $all_offers = Ad::select('image')->take(4)->get();
        $weekend_offers = Ad::select('image')->skip(4)->take(4)->get();
        $buy_your_mind_is_frees = Ad::select('image')->skip(8)->take(4)->get();
        $dealOfDay_products = Product::where('deal_of_the_day', true)->paginate(6);
        $electronics_products_photos = Product::where('mainCategory_id', 4)->paginate(6);
        $electronics_products = Product::where('mainCategory_id', 4)->where('flash_sale', true)->paginate(6);
        $banners = Ad::select('image')->take(3)->get();
        $men_products_photos = Product::where('mainCategory_id', 1)->paginate(6);
        $men_products = Product::where('mainCategory_id', 1)->where('flash_sale', true)->paginate(6);
        $women_products_photos = Product::where('mainCategory_id', 2)->paginate(6);
        $women_products = Product::where('mainCategory_id', 2)->where('flash_sale', true)->paginate(6);
        $beauty_products_photos = Product::where('mainCategory_id', 5)->paginate(6);
        $accessories_products_photos = Product::where('mainCategory_id', 7)->paginate(6);
        $accessories_products = Product::where('mainCategory_id', 7)->where('flash_sale', true)->paginate(6);

        // best sellings
        $items = DB::table('carts')->select('quantity', DB::raw('COUNT(product_id) as count'))->groupBy('quantity')->orderBy('count', 'desc')->get();
        $product_ids = [];
        foreach ($items as $item) {
            array_push($product_ids, $item->quantity);
        }
        $best_sellings = Product::whereIn('id', $product_ids)->paginate(6);
        $home_products_photos = Product::where('mainCategory_id', 6)->paginate(6);
        $home_products = Product::where('mainCategory_id', 6)->paginate(6);
        $new_products = Product::paginate(6);
        $ads = Ad::select('image')->get();



        $flash_products = Product::where('flash_sale', true)->paginate(6);
        $featured_products = Product::where('featured', true)->paginate(6);
        $childrens_products = Product::where('mainCategory_id', 3)->paginate(6);


        return view('home', compact('brand_slides', 'category_slides', 'all_offers', 'weekend_offers', 'buy_your_mind_is_frees',
            'dealOfDay_products', 'electronics_products_photos', 'electronics_products','banners','men_products_photos',
            'men_products','women_products_photos','women_products','beauty_products_photos','accessories_products_photos',
            'accessories_products','best_sellings','home_products_photos','home_products','new_products','ads',
            'flash_products',
              'childrens_products',  'featured_products', 'dealOfDay_products'));
    }
}
