<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
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
        $brand_slides = Brand::select('image')->get();
        $category_slides = Category::parent()->select('name', 'image')->limit(7)->get();
        $ad_images = Ad::select('name', 'image')->limit(3)->get();
        $new_products = Product::paginate(6);
        $featured_products = Product::where('featured', true)->paginate(6);
        $dealOfDay_products = Product::where('deal_of_the_day', true)->paginate(6);
        $flash_products = Product::where('flash_sale', true)->paginate(6);
        $men_products = Product::where('mainCategory_id',1)->paginate(6);
        $women_products = Product::where('mainCategory_id',2)->paginate(6);
        $childrens_products = Product::where('mainCategory_id',3)->paginate(6);
        $electronics_products = Product::where('mainCategory_id',4)->paginate(6);
        $beauty_products = Product::where('mainCategory_id',5)->paginate(6);
        $home_products = Product::where('mainCategory_id',6)->paginate(6);

         // best sellings
         $items = DB::table('carts')->select('quantity', DB::raw('COUNT(product_id) as count'))->groupBy('quantity')->orderBy('count', 'desc')->get();
         $product_ids = [];
         foreach ($items as $item) {
             array_push($product_ids, $item->quantity);
         }
         $best_sellings = Product::whereIn('id', $product_ids)->get();


        return view('home', compact('brand_slides','home_products','beauty_products','childrens_products', 'category_slides','women_products', 'ad_images', 'new_products','featured_products','dealOfDay_products','flash_products','men_products','electronics_products','best_sellings'));
    }
}
