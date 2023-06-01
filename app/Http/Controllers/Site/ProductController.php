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

class ProductController extends Controller
{
    public function productByName($name, $id = null)
    {

        $productDetails = Product::where('name', $name)->orWhere('id', $id)->first();
        $brand_name = Brand::where('id', $productDetails->id)->select('name')->first();
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

        $progresseData = [];
        if ($reviewsCount > 0) {
            $progresseData = [

                '1' => $productDetails->reviews()->where('star_rating', 1)->count() / $reviewsCount * 100,
                '2' => $productDetails->reviews()->where('star_rating', 2)->count() / $reviewsCount * 100,
                '3' => $productDetails->reviews()->where('star_rating', 3)->count() / $reviewsCount * 100,
                '4' => $productDetails->reviews()->where('star_rating', 4)->count() / $reviewsCount * 100,
                '5' => $productDetails->reviews()->where('star_rating', 5)->count() / $reviewsCount * 100,
            ];

        } else {
            $reviewsCount = 0;
        }

        $average = $reviewsCount ? round($productDetails->reviews()->sum('star_rating') / $reviewsCount, 2) : 0;
        $vendor = Vendor::where('id', $productDetails->vendor_id)->first();

        $productsWithRatingOne = $productDetails->reviews()->where('star_rating', 1)->count();
        $productsWithRatingTwo = $productDetails->reviews()->where('star_rating', 2)->count();
        $productsWithRatingThree = $productDetails->reviews()->where('star_rating', 3)->count();
        $productsWithRatingFour = $productDetails->reviews()->where('star_rating', 4)->count();
        $productsWithRatingFive = $productDetails->reviews()->where('star_rating', 5)->count();

        $review_details = Review::with(['product', 'user'])->where('product_id', $productDetails->id)->get();

        return view('site.categories.product', compact('productDetails', 'related_products', 'vendors_products', 'product_colors', 'product_sizes', 'reviews', 'average', 'vendor', 'productsWithRatingOne',
            'productsWithRatingTwo', 'productsWithRatingThree', 'productsWithRatingFour', 'productsWithRatingFive', 'review_details', 'brand_name',
            'productSpecifications'
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
        $category = $request->get('category');
        if (!empty($category)) {
            $category = Category::where('name', $category)->first();
            if (!$category) {
                return redirect()->back()->with('error', 'Category not found');
            }
            $products = Product::where('mainCategory_id', $category->id)->paginate(4);
            $productColors = ProductColor::distinct()->get(['name']);
            $productSizes = Productsize::distinct()->get(['name']);
            $allCategories = Category::Parent()->paginate(4);
            $ads = Ad::paginate(1);
            return view('site.categories.products', compact('category', 'productColors', 'productSizes', 'products', 'allCategories', 'ads'));
        }

        $name = $request->get('name');
        if (!empty($name)) {
            $product = Product::where('name', 'LIKE', '%' . $name . '%')->first();

            $product_categories_ids = $product->categories->pluck('id'); // [1,26,7] get all categories that product on it

            $related_products = Product::whereHas('categories', function ($cat) use ($product_categories_ids) {
                $cat->whereIn('categories.id', $product_categories_ids);
            })->limit(20)->latest()->get();

            $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();

            $product_colors = ProductColor::with('product')->where('product_id', $product->id)->get();
            $product_sizes = Productsize::with('product')->where('product_id', $product->id)->get();
            $reviews = Product::with('reviews')->where('id', $product->id)->get();

            $reviewsCount = $product->reviews()->count();

            $progresseData = [];
            if ($reviewsCount > 0) {
                $progresseData = [

                    '1' => $product->reviews()->where('star_rating', 1)->count() / $reviewsCount * 100,
                    '2' => $product->reviews()->where('star_rating', 2)->count() / $reviewsCount * 100,
                    '3' => $product->reviews()->where('star_rating', 3)->count() / $reviewsCount * 100,
                    '4' => $product->reviews()->where('star_rating', 4)->count() / $reviewsCount * 100,
                    '5' => $product->reviews()->where('star_rating', 5)->count() / $reviewsCount * 100,
                ];

            } else {
                $reviewsCount = 0;
            }

            $average = $reviewsCount ? round($product->reviews()->sum('star_rating') / $reviewsCount, 2) : 0;
            $vendor = Vendor::where('id', $product->vendor_id)->first();

            $productsWithRatingOne = $product->reviews()->where('star_rating', 1)->count();
            $productsWithRatingTwo = $product->reviews()->where('star_rating', 2)->count();
            $productsWithRatingThree = $product->reviews()->where('star_rating', 3)->count();
            $productsWithRatingFour = $product->reviews()->where('star_rating', 4)->count();
            $productsWithRatingFive = $product->reviews()->where('star_rating', 5)->count();

            $review_details = Review::with(['product', 'user'])->where('product_id', $product->id)->get();

            if ($product) {
                return view('site.search.search', compact('product', 'related_products', 'vendors_products', 'product_colors', 'product_sizes', 'reviews', 'average', 'vendor', 'productsWithRatingOne',
                    'productsWithRatingTwo', 'productsWithRatingThree', 'productsWithRatingFour', 'productsWithRatingFive', 'review_details'
                ));
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
