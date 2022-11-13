<?php

namespace App\Http\Controllers;

use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use Illuminate\Http\Request;

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
        $category_slides = Category::parent()->select('name','image')->limit(7)->get();
        $ad_images = Ad::select('name','image')->limit(5)->get();
        return view('home',compact('brand_slides','category_slides','ad_images'));
    }
    
}
