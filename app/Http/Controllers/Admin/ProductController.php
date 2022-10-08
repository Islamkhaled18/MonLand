<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    public function index()
    {
        if(!Gate::allows('products')){
            return view('admin.errors.notAllowed');
        }

        $products = Product::select('id','name','price', 'created_at')->paginate(5);
        return view('admin.products.general.index')->with([
            'products'=>$products
        ]);
    }//end of index

    public function create()
    {
        if(!Gate::allows('products.create')){
            return view('admin.errors.notAllowed');
        }

        $brands = Brand::select('id','name')->get();
        $categories = Category::select('id','name')->get();
        return view('admin.products.general.create', compact('brands','categories'));
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|max:1000',
            'short_description' => 'nullable|max:500',
            'categories' => 'array|min:1', //[]
            'categories.*' => 'numeric|exists:categories,id',
            'brand_id' => 'required|exists:brands,id'
        ]);

        DB::beginTransaction();
        //validation
        if (!$request->has('is_active'))
            $request->request->add(['is_active' => 0]);
        else
            $request->request->add(['is_active' => 1]);

        $product = new Product();
        $product->slug = $request->slug;
        $product->brand_id = $request->brand_id;
        $product->is_active = $request->is_active;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->anotherInformation = $request->anotherInformation;
        $product->save();

        if($request->hasfile('photo')){
            foreach($request->file('photo') as $images){
                $name = $images->hashName();
                $images->storeAs('images/products/'. $product->id , $name);
                $images = new Image();
                $images->photo = $name;
                $images->product_id = $product->id;
                $images->save();

            }
        }
        $product->categories()->attach($request->categories);
        DB::commit();
        toastr()->success('تمت اضافة المنتج بنجاح');
        return redirect()->route('products.index');

    }//end of basic information

    public function getPrice($product_id){

        if(!Gate::allows('products.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.products.prices.create') -> with('id',$product_id) ;
    }//end of price

    public function saveProductPrice(Request $request){

        $request->validate([
            'price' => 'required|min:0|numeric',
            'product_id' => 'required|exists:products,id',
            'special_price' => 'nullable|numeric',
            'special_price_type' => 'required_with:special_price|in:fixed,percent',
            'special_price_start' => 'required_with:special_price|date_format:Y-m-d',
            'special_price_end' => 'required_with:special_price|date_format:Y-m-d'
        ]);

        Product::whereId($request->product_id) -> update($request -> only(['price','special_price','special_price_type','special_price_start','special_price_end']));

        toastr()->success('تمت اضافة بيانات على المنتج بنجاح');
        return redirect()->route('products.index');
        
    }//end of saveProductPrice

    public function getStock($product_id){

        if(!Gate::allows('products.create')){
            return view('admin.errors.notAllowed');
        }
        $vendors = Vendor::all();
        return view('admin.products.stock.create',compact('vendors')) ->with('id',$product_id) ;
    }//end of getStock

    public function saveProductStock (Request $request)
    {
        $request->validate([
            'sku' => 'nullable|min:3|max:10',
            'product_id' => 'required|exists:products,id',
            'manage_stock' => 'required|in:0,1',
            'in_stock' => 'required|in:0,1',
        ]);

        Product::whereId($request -> product_id) -> update($request-> except(['_token','product_id']));
        toastr()->success('تمت اضافة بيانات على المنتج بنجاح');
        return redirect()->route('products.index');
    }//end of saveProductStock


    public function edit($id)
    {

        if(!Gate::allows('products.edit')){
            return view('admin.errors.notAllowed');
        }
       $product = Product::findOrFail($id);
       $categories = Category::all();
       $vendors = Vendor::all();
       $brands = Brand::all();

        return view('admin.products.edit', compact('product','categories','vendors','brands'));

    }

    public function update($id, Request $request)
    {

        $product = Product::findOrFail($id);

        if($request->hasfile('photo')){
            Storage::disk('local')->deleteDirectory('images/products/'. $product->id );
            foreach($product->images as $img){
                $img->delete();
            }

            foreach($request->file('photo') as $images){
                $name = $images->hashName();
                $images->storeAs('images/products/'. $product->id , $name);
                $images = new Image();
                $images->photo = $name;
                $images->product_id = $product->id;
                $images->save();
            }
        }
        
        $product->update($request-> except('_token','categories','photo'));
        $product->categories()->sync($request->categories);

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('products.index');
     
    }


    public function destroy($id)
    {
        if(!Gate::allows('products.destroy')){
            return view('admin.errors.notAllowed');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        Toastr()->success('تم حذف المنتج بنجاح');
        return redirect()->route('products.index');
    
    }//end of destroy

}
