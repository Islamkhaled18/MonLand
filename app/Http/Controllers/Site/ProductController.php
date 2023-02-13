<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productByName($name, $id = null)
    {

        $product = Product::where('name', $name)->orwhere('id',$id)->first();

        $product_categories_ids =  $product->categories->pluck('id'); // [1,26,7] get all categories that product on it

        $related_products = Product::whereHas('categories', function ($cat) use ($product_categories_ids) {
            $cat->whereIn('categories.id', $product_categories_ids);
        })->limit(20)->latest()->get();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();

        $product_colors = ProductColor::with('product')->where('product_id', $product->id)->get();
        $product_sizes = Productsize::with('product')->where('product_id', $product->id)->get();
        $reviews = Product::with('reviews')->where('id',$product->id)->get();

        $reviewsCount = $product->reviews()->count();

        $progresseData =  [];
        if($reviewsCount > 0){
        $progresseData =  [
    
            '1' => $product->reviews()->where('star_rating', 1)->count() / $reviewsCount *100 ,
            '2' => $product->reviews()->where('star_rating', 2)->count() / $reviewsCount *100,
            '3' => $product->reviews()->where('star_rating', 3)->count() / $reviewsCount *100,
            '4' => $product->reviews()->where('star_rating', 4)->count() / $reviewsCount *100,
            '5' => $product->reviews()->where('star_rating', 5)->count() / $reviewsCount *100,
            ];
    
        }else{
            $reviewsCount = 0;
        }

        $average =  $reviewsCount ? round($product->reviews()->sum('star_rating') / $reviewsCount ,2) : 0;
        $vendor = Vendor::where('id', $product->vendor_id)->first();

        $productsWithRatingOne = $product->reviews()->where('star_rating', 1)->count();
        $productsWithRatingTwo = $product->reviews()->where('star_rating', 2)->count();
        $productsWithRatingThree = $product->reviews()->where('star_rating', 3)->count();
        $productsWithRatingFour = $product->reviews()->where('star_rating', 4)->count();
        $productsWithRatingFive = $product->reviews()->where('star_rating', 5)->count();


        $review_details = Review::with(['product','user'])->where('product_id',$product->id)->get();

     


        return view('site.categories.product', compact('product', 'related_products', 'vendors_products','product_colors','product_sizes','reviews','average','vendor','productsWithRatingOne',
        'productsWithRatingTwo','productsWithRatingThree','productsWithRatingFour','productsWithRatingFive','review_details'
        ));
    }

    public function vendorProducts($id)
    {
        $product = Product::where('id', $id)->first();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_products', compact('product', 'vendors_products', 'vendor'));
    } // الكنترولر اللي بيجيب البائع بمنتجاته


    public function getVendor($id)
    {
        $product = Product::where('id', $id)->first();
        $vendor = Vendor::where('id', $product->vendor_id)->first();

        $reviews = Vendor::with('reviews')->where('id',$vendor->id)->get();

        
        $reviewsCount = $vendor->reviews()->count();
        
        $progresseData =  [];
        if($reviewsCount > 0){
            $progresseData =  [
                
                '1' => $vendor->reviews()->where('star_rating', 1)->count() / $reviewsCount *100 ,
                '2' => $vendor->reviews()->where('star_rating', 2)->count() / $reviewsCount *100,
                '3' => $vendor->reviews()->where('star_rating', 3)->count() / $reviewsCount *100,
            '4' => $vendor->reviews()->where('star_rating', 4)->count() / $reviewsCount *100,
            '5' => $vendor->reviews()->where('star_rating', 5)->count() / $reviewsCount *100,
        ];
        
    }else{
        $reviewsCount = 0;
    }
        
    $average =  $reviewsCount ? (round($vendor->reviews()->sum('star_rating') / $reviewsCount ,2) ) : 0;

    // $productsWithReviews = Product::whereHas('reviews')->with('reviews')->with('reviews.user')->where('vendor_id', $vendor->id)->get();

    $productsWithReviews = Review::with(['product','user'])->where('product_id',$product->id)->get();
    return $productsWithReviews;

    // $productsWithReviews = Product::whereHas('reviews')->with(['reviews.user'])->where('vendor_id', $vendor->id)
    // ->get();

        return view('site.categories.vendorDetails', compact('vendor','average','reviewsCount','productsWithReviews'));
    }

}
