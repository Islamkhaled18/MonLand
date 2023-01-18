<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function productByName($name)
    {

        $product = Product::where('name', $name)->first();

        $product_categories_ids =  $product->categories->pluck('id'); // [1,26,7] get all categories that product on it

        $related_products = Product::whereHas('categories', function ($cat) use ($product_categories_ids) {
            $cat->whereIn('categories.id', $product_categories_ids);
        })->limit(20)->latest()->get();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();



        return view('site.categories.product', compact('product', 'related_products', 'vendors_products'));
    }

    public function vendorProducts($id)
    {
        $product = Product::where('id', $id)->first();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_products', compact('product', 'vendors_products','vendor'));
    }


    public function getVendor($id)
    {
        $product = Product::where('id', $id)->first();
        $vendor = Vendor::where('id', $product->vendor_id)->first();


        return view('site.categories.vendorDetails',compact('vendor'));
    }
}
