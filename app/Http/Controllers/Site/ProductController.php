<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use App\Models\Size;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class ProductController extends Controller
{
    public function productByName($name, $id = null)
    {

        $productDetails = Product::where('name', $name)->orWhere('id', $id)->first();


        $brand_name = Brand::where('id', $productDetails->brand_id)->select('name')->first();

        $productSpecifications = $productDetails->specifications;
        $product_categories_ids = $productDetails->categories->pluck('id'); // [1,26,7] get all categories that product on it
        $related_products = Product::whereHas('categories', function ($cat) use ($product_categories_ids) {
            $cat->whereIn('categories.id', $product_categories_ids);
        })->limit(20)->latest()->get();
        $vendors_products = Product::with('Vendor')->where('vendor_id', $productDetails->vendor->id)->get();
        $product_colors = ProductColor::with('product')->where('product_id', $productDetails->id)->get();
        $product_sizes = Productsize::with('product')->where('product_id', $productDetails->id)->get();

        $reviews = Product::with('reviews')->where('id', $productDetails->id)->get();
        $reviewsCount = $productDetails->reviews()->count();
        $averageStarRating = $productDetails->reviews()->avg('star_rating');
        $averageStarRating = round($averageStarRating, 2);

        $vendor = Vendor::where('id', $productDetails->vendor_id)->first();

        $reviewsCountVendor = $vendor->reviews()->count();

        $average = $reviewsCountVendor ? round(($vendor->reviews()->sum('star_rating') / ($reviewsCountVendor * 5)) * 100, 2) : 0;

        $productsWithRatingOne = $productDetails->reviews()->where('star_rating', 1)->count();
        $productsWithRatingTwo = $productDetails->reviews()->where('star_rating', 2)->count();
        $productsWithRatingThree = $productDetails->reviews()->where('star_rating', 3)->count();
        $productsWithRatingFour = $productDetails->reviews()->where('star_rating', 4)->count();
        $productsWithRatingFive = $productDetails->reviews()->where('star_rating', 5)->count();

        $users_review_details = Review::with(['product', 'user'])->where('product_id', $productDetails->id)->paginate(5);

        $shareUrl = URL::route('Site.product', ['name' => $productDetails->name]);

        return view('site.categories.product', compact('productDetails', 'related_products', 'vendors_products', 'product_colors', 'product_sizes', 'reviews', 'vendor', 'productsWithRatingOne',
            'productsWithRatingTwo', 'productsWithRatingThree', 'productsWithRatingFour', 'productsWithRatingFive', 'users_review_details', 'brand_name',
            'productSpecifications', 'shareUrl', 'reviewsCount', 'averageStarRating','average'
        ));
    }

    // public function search(Request $request){

    //     $product = Product::when(($request->has('name') & !empty($request->get('name'))), function ($q) use ($request) {
    //         $q->where('name', 'LIKE', '%' . $request->get('name') . '%');
    //     })->first();

    //     if ($product) {
    //         return view('site.search.search',compact('product'));
    //     }

    //     return redirect()->back()->with('error', 'Product not found');

    // }

    public function search(Request $request)
    {

        $name = $request->get('name');
        if (!empty($name)) {
            $product = Product::where('name', 'LIKE', '%' . $name . '%')->first();


            if ($product) {
                return redirect()->route('Site.product', ['name' => $product->name]);

            }
        }

        return redirect()->back()->with('error', 'Product or category not found');
    }

    public function sizeTable()
    {
        $size = Size::first();
        return view('site.categories.size', compact('size'));

    }

}
