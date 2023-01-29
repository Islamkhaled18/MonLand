<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function allCategory()
    {
        $allCategories =  Category::parent()->select('id', 'name')->with(['childrens' => function ($q) {
            $q->select('id', 'parent_id', 'name');
            $q->with(['childrens' => function ($qq) {
                $qq->select('id', 'parent_id', 'name');
            }]);
        }])->get();
        return view('site.categories.allCategories', compact('allCategories'));
    }

    public function productsByName($name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $products = $category->products;
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('category', 'products', 'allCategories', 'ads'));
    }


    public function search_products_by_price(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $products = $category->products->where('price', '>=', $request->multi)->all();
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();
    }
    public function search_products_by_created_at(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category && $request->sort_by == 'sort_by') {
            $products = $category->products->sortBy('created_at')->all();
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();
    }

    public function get_all_products(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $products = $category->products->all();
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();
    }


    public function get_flash_products(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $products = $category->products->where('flash_sale', 1)->all();
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();
    }

    public function get_products_ByBrands(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        $brand = $request->brand; //brand

        if ($category && $brand) {
            $products = $category->products->whereIN('brand_id', explode(',', $brand))->all();
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('products', 'category', 'allCategories', 'ads'))->render();
    }
}
