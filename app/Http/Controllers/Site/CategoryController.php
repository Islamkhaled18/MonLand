<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductColor;
use App\Models\Productsize;
use App\Models\Review;
use Illuminate\Http\Request;


// الفانكشنشز اللى تخص فلاتر منتجات الاقسام
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

    public function categoryProducts($name)
    {
        $category = Category::where('name', $name)->first();

         $productColors = ProductColor::distinct()->get(['name']);

         $productSizes = Productsize::distinct()->get(['name']);

         

        if ($category) {
            
            //$products = $category->products->paginate(4);

           $products = Product::where("mainCategory_id" , $category->id)->paginate(4);
  
                      
        }
        $allCategories = Category::Parent()->paginate(4);
    
        $ads = Ad::paginate(1);

        return view('site.categories.products', compact('category', 'productColors' ,'productSizes' ,'products', 'allCategories', 'ads'));
    }


    public function search_products_by_price(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            $products = Product::where("mainCategory_id" , $category->id)
            ->where('price', '>=', $request->multi)
            ->paginate(4);
            //$products = $category->products->where('price', '>=', $request->multi);
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();
    }
     public function search_products_by_created_at(Request $request, $name)
     {
         $category = Category::where('name', $name)->first();
         
        if ($category) {
             //$products = $category->products->sortBy('created_at')->paginate(4);

             $products = Product::where("mainCategory_id" , $category->id)
             ->orderBy("created_at" , "desc")
             ->paginate(4);

            
         }
         $allCategories = Category::Parent()->paginate(4);
         $ads = Ad::paginate(1);

         return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();
     }

    public function get_all_products(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

        if ($category) {
            
           $products = Product::where("mainCategory_id" , $category->id)->paginate(4);
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();
    }


    public function get_flash_products(Request $request, $name)
    {
        $category = Category::where('name', $name)->first();

    
        if ($category) {

           $products = Product::where("mainCategory_id" , $category->id)
            ->where('flash_sale', 1)
            ->paginate(4);
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);

        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();
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

        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();
    }

    public function search_by_color(Request $request, $name){
        $category = Category::where('name', $name)->first();
          
        $colors =  ProductColor::where("name" , $request->color)->pluck('product_id')->toArray();

        $colorsArr = array_values($colors);

           
      
        if($category) {

            $products = Product::where("mainCategory_id" , $category->id)
            ->whereIN("id" , $colorsArr)->paginate(4);            
        }
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);



        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();

    }

    public function search_by_size(Request $request , $name){

        $category = Category::where('name', $name)->first();

        $sizes = Productsize::where('name' , $request->size)->pluck('product_id')->toArray();

        

        if($category) {

            $products = Product::where("mainCategory_id" , $category->id)
            ->whereIN("id" , $sizes)->paginate(4); 

            
            
            
        }
         
        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);



        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();

    }

    public function search_by_review_products(Request $request , $name){
          
        $category = Category::where('name', $name)->first();

         $reviews = Review::where("star_rating" , $request->rating)->pluck('product_id')->toArray();

    
         if($category) {

            $products = Product::where("mainCategory_id" , $category->id)
            ->whereIN("id" , $reviews)->paginate(4); 
 
        }


        $allCategories = Category::Parent()->paginate(4);
        $ads = Ad::paginate(1);



        return view('site.categories.filterProducts', compact('products', 'category', 'allCategories', 'ads'))->render();


    }


    
}
