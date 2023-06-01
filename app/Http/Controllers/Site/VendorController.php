<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use App\Models\Size;
use App\Models\Vendor;

class VendorController extends Controller
{
    public function vendorProducts($id)
    {
        $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->paginate(12);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_products', compact('product', 'productColors', 'productSizes', 'vendors_products', 'vendor'));
    }

    public function getVendor($id)
    {
        $product = Product::where('id', $id)->first();
        $vendor = Vendor::where('id', $id)->first();

        $reviews = Vendor::with('reviews')->where('id', $vendor->id)->get();

        $reviewsCount = $vendor->reviews()->count();

        $progresseData = [];
        if ($reviewsCount > 0) {
            $progresseData = [

                '1' => $vendor->reviews()->where('star_rating', 1)->count() / $reviewsCount * 100,
                '2' => $vendor->reviews()->where('star_rating', 2)->count() / $reviewsCount * 100,
                '3' => $vendor->reviews()->where('star_rating', 3)->count() / $reviewsCount * 100,
                '4' => $vendor->reviews()->where('star_rating', 4)->count() / $reviewsCount * 100,
                '5' => $vendor->reviews()->where('star_rating', 5)->count() / $reviewsCount * 100,
            ];

        } else {
            $reviewsCount = 0;
        }

        $average = $reviewsCount ? (round($vendor->reviews()->sum('star_rating') / $reviewsCount, 2)) : 0;

        // $productsWithReviews = Product::whereHas('reviews')->with('reviews')->with('reviews.user')->where('vendor_id', $vendor->id)->get();

        $productsWithReviews = Review::with(['product', 'user'])->where('product_id', $product->id)->get();

        // $productsWithReviews = Product::whereHas('reviews')->with(['reviews.user'])->where('vendor_id', $vendor->id)
        // ->get();

        return view('site.categories.vendorDetails', compact('vendor', 'average', 'reviewsCount', 'productsWithReviews'));
    }

    public function search_products_by_created_at(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)
            ->orderBy("created_at", "desc")
            ->paginate(12);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'productColors', 'productSizes', 'vendors_products', 'vendor'))->render();

    }

    public function get_all_products(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->paginate(12);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'productColors', 'productSizes', 'vendors_products', 'vendor'))->render();

    }

    public function get_flash_products(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)

            ->where('flash_sale', 1)

            ->paginate(12);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'vendors_products', 'vendor'))->render();

    }

    public function search_products_by_price(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $vendors_products = Product::with('Vendor')
            ->where('vendor_id', $product->vendor->id)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->paginate(12);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'productColors', 'productSizes', 'vendors_products', 'minPrice','maxPrice','vendor'))->render();

    }

    public function get_products_ByBrands(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $brand = $request->brand; //brand
        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)
            ->whereIN('brand_id', explode(',', $brand))->paginate(4);
        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'vendors_products', 'vendor'))->render();
    }

    public function search_by_color(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $colors = ProductColor::where("name", $request->color)->pluck('product_id')->toArray();

        $colorsArr = array_values($colors);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->whereIN("id", $colorsArr)->paginate(4);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'vendors_products', 'vendor'))->render();

    }

    public function search_by_size(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();

        $sizes = Productsize::where('name', $request->size)->pluck('product_id')->toArray();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->whereIN("id", $sizes)->paginate(4);

        $vendor = Vendor::where('id', $product->vendor_id)->first();
        return view('site.categories.vendor_filter_products', compact('product', 'vendors_products', 'vendor'))->render();

    }

    public function search_by_review_products(Request $request, $id)
    {

        $product = Product::where('id', $id)->first();
        $reviews = Review::where("star_rating", $request->rating)->pluck('product_id')->toArray();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->whereIN("id", $reviews)->paginate(4);

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('product', 'vendors_products', 'vendor'))->render();

    }
}
