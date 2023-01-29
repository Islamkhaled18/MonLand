<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Option;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
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


        return view('site.categories.product', compact('product', 'related_products', 'vendors_products','product_colors','product_sizes'));
    }

    public function vendorProducts($id)
    {
        $product = Product::where('id', $id)->first();

        $vendors_products = Product::with('Vendor')->where('vendor_id', $product->vendor->id)->get();

        $vendor = Vendor::where('id', $product->vendor_id)->first();

        return view('site.categories.vendor_products', compact('product', 'vendors_products', 'vendor'));
    }


    public function getVendor($id)
    {
        $product = Product::where('id', $id)->first();
        $vendor = Vendor::where('id', $product->vendor_id)->first();


        return view('site.categories.vendorDetails', compact('vendor'));
    }
}
