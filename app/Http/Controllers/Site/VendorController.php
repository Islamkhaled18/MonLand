<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use App\Models\Size;
use App\Models\Vendor;
use Illuminate\Http\Request;

class VendorController extends Controller
{
    public function vendorProducts($id)
    {
        $vendor = Vendor::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)->paginate(12);

        $reviewsCount = $vendor->reviews()->count();

        $average = $reviewsCount ? round(($vendor->reviews()->sum('star_rating') / ($reviewsCount * 5)) * 100, 2) : 0;


        return view('site.categories.vendor_products', compact('productColors', 'productSizes', 'vendors_products', 'vendor','reviewsCount','average'));
    }

    public function getVendor($id)
    {
        // $product = Product::where('id', $id)->first();
        $vendor = Vendor::where('id', $id)->first();

        $reviews = Vendor::with('reviews')->where('id', $vendor->id)->get();

        $reviewsCount = $vendor->reviews()->count();


        $vendor_products = Product::where('vendor_id',$vendor->id)->get();


        $users_review_details = Review::with(['product', 'user', 'vendor'])
        ->whereIn('product_id', function ($query) use ($vendor) {
            $query->select('id')
                ->from('products')
                ->where('vendor_id', $vendor->id);
        })
        ->paginate(5);




        $average = $reviewsCount ? round(($vendor->reviews()->sum('star_rating') / ($reviewsCount * 5)) * 100, 2) : 0;



        return view('site.categories.vendorDetails', compact('vendor', 'average', 'reviewsCount','users_review_details'));
    }

    public function search_products_by_created_at(Request $request, $id)
    {

        // $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendor = Vendor::where('id', $id)->first();
        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)
            ->orderBy("created_at", "desc")
            ->paginate(12);

        return view('site.categories.vendor_filter_products', compact('productColors', 'productSizes', 'vendors_products', 'vendor'))->render();

    }

    public function get_all_products(Request $request, $id)
    {

        // $product = Product::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $vendor = Vendor::where('id', $id)->first();
        $vendors_products = Product::with('Vendor')->where('vendor_id', $id)->paginate(12);

        return view('site.categories.vendor_filter_products', compact('productColors', 'productSizes', 'vendors_products', 'vendor'))->render();

    }

    public function get_flash_products(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)

            ->where('flash_sale', 1)

            ->paginate(12);

        // $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_filter_products', compact('vendors_products', 'vendor'))->render();

    }

    public function search_products_by_price(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();

        $productColors = ProductColor::distinct()->get(['name']);

        $productSizes = Productsize::distinct()->get(['name']);

        $minPrice = $request->input('minPrice');
        $maxPrice = $request->input('maxPrice');

        $vendors_products = Product::with('Vendor')
            ->where('vendor_id', $vendor->id)
            ->whereBetween('price', [$minPrice, $maxPrice])
            ->paginate(12);


        return view('site.categories.vendor_filter_products', compact('productColors', 'productSizes', 'vendors_products', 'minPrice', 'maxPrice', 'vendor'))->render();

    }

    public function get_products_ByBrands(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();

        $brand = $request->brand; //brand
        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)
            ->whereIN('brand_id', explode(',', $brand))->paginate(4);

        return view('site.categories.vendor_filter_products', compact( 'vendors_products', 'vendor'))->render();
    }

    public function search_by_color(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();

        $colors = ProductColor::where("name", $request->color)->pluck('product_id')->toArray();

        $colorsArr = array_values($colors);

        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)->whereIN("id", $colorsArr)->paginate(4);


        return view('site.categories.vendor_filter_products', compact('vendors_products', 'vendor'))->render();

    }

    public function search_by_size(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();

        $sizes = Productsize::where('name', $request->size)->pluck('product_id')->toArray();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)->whereIN("id", $sizes)->paginate(4);

        return view('site.categories.vendor_filter_products', compact('vendors_products', 'vendor'))->render();

    }

    public function search_by_review_products(Request $request, $id)
    {

        $vendor = Vendor::where('id', $id)->first();
        $reviews = Review::where("star_rating", $request->rating)->pluck('product_id')->toArray();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $vendor->id)->whereIN("id", $reviews)->get();


        return view('site.categories.vendor_filter_products', compact('vendors_products', 'vendor'))->render();

    }
}
