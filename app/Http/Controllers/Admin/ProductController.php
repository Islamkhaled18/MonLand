<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Category;
use App\Models\Image;
use App\Models\MainCategory;
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
        if (!Gate::allows('products')) {
            return view('admin.errors.notAllowed');
        }

        $products = Product::with('specifications')->paginate(5);
        return view('admin.products.general.index')->with([
            'products' => $products,
        ]);
    } //end of index

    public function create()
    {
        if (!Gate::allows('products.create')) {
            return view('admin.errors.notAllowed');
        }

        $brands = Brand::select('id', 'name')->get();
        $categories = Category::select('id', 'name')->get();
        $mainCategories = MainCategory::select('id', 'name')->get();
        $vendors = Vendor::all();
        return view('admin.products.general.create', compact('brands', 'categories', 'vendors', 'mainCategories'));
    } //end of create

    public function store(Request $request)
    {

        // return $request;
        $request->validate([
            'name' => 'required|max:100',
            'slug' => 'required|unique:products,slug',
            'description' => 'required|max:1000',
            'short_description' => 'nullable|max:500',
            'categories' => 'array|min:1',
            'categories.*' => 'numeric|exists:categories,id',
            'brand_id' => 'required|exists:brands,id',
            'price' => 'required',
            'sku' => 'nullable|min:3|max:10',
            'manage_stock' => 'required|in:0,1',
            'in_stock' => 'required|in:0,1',
            'cover_image' => 'mimes:png,jpg,bmp,jpeg,webp',

        ]);

        DB::beginTransaction();
        //validation
        if (!$request->has('is_active')) {
            $request->request->add(['is_active' => 0]);
        } else {
            $request->request->add(['is_active' => 1]);
        }

        if (!$request->has('featured')) {
            $request->request->add(['featured' => 0]);
        } else {
            $request->request->add(['featured' => 1]);
        }

        if (!$request->has('deal_of_the_day')) {
            $request->request->add(['deal_of_the_day' => 0]);
        } else {
            $request->request->add(['deal_of_the_day' => 1]);
        }

        if (!$request->has('flash_sale')) {
            $request->request->add(['flash_sale' => 0]);
        } else {
            $request->request->add(['flash_sale' => 1]);
        }

        if (!$request->has('quick_request')) {
            $request->request->add(['quick_request' => 0]);
        } else {
            $request->request->add(['quick_request' => 1]);
        }

        $product = new Product();
        $product->slug = $request->slug;
        $product->brand_id = $request->brand_id;
        $product->is_active = $request->is_active;
        $product->featured = $request->featured;
        $product->deal_of_the_day = $request->deal_of_the_day;
        $product->flash_sale = $request->flash_sale;
        $product->quick_request = $request->quick_request;
        $product->name = $request->name;
        $product->description = $request->description;
        $product->short_description = $request->short_description;
        $product->anotherInformation = $request->anotherInformation;
        $product->price = $request->price;
        $product->manage_stock = $request->manage_stock;
        $product->in_stock = $request->in_stock;
        $product->qty = $request->qty;
        $product->vendor_id = $request->vendor_id;
        $product->mainCategory_id = $request->mainCategory_id;
        $product->weight = $request->weight;
        $product->dimension = $request->dimension;
        $product->material = $request->material;
        // Save cover image if uploaded
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('public/images');
            $product->cover_image = $path;
        }

        $product->save();

        foreach ($request->file('photo') as $imagefile) {
            $image = new Image;
            $path = $imagefile->store('/images/products', ['disk' => 'my_files']);
            $image->photo = $path;
            $image->product_id = $product->id;
            $image->save();
        }

        $product->categories()->attach($request->categories);
        DB::commit();
        toastr()->success('تمت اضافة المنتج بنجاح');
        return redirect()->route('products.index');
    } //end of basic information

    public function edit($id)
    {

        if (!Gate::allows('products.edit')) {
            return view('admin.errors.notAllowed');
        }
        $product = Product::findOrFail($id);
        $categories = Category::all();
        $vendors = Vendor::all();
        $brands = Brand::all();
        $mainCategories = MainCategory::select('id', 'name')->get();

        return view('admin.products.edit', compact('product', 'categories', 'vendors', 'brands', 'mainCategories'));
    }

    public function update($id, Request $request)
    {

        $product = Product::findOrFail($id);

        if ($request->hasfile('photo')) {
            Storage::disk('my_files')->deleteDirectory('images/products/');
            foreach ($product->images as $img) {
                $img->delete();
            }

            foreach ($request->file('photo') as $imagefile) {
                $image = new Image;
                $path = $imagefile->store('/images/products', ['disk' => 'my_files']);
                $image->photo = $path;
                $image->product_id = $product->id;
                $image->save();
            }
        }

        $product->update($request->except('_token', 'categories', 'photo'));
        $product->categories()->sync($request->categories);


        // Update cover image if uploaded
        if ($request->hasFile('cover_image')) {
            $path = $request->file('cover_image')->store('public/images');
            $product->cover_image = $path;
            $product->save();
        }

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('products.index');
    }

    public function destroy($id)
    {
        if (!Gate::allows('products.destroy')) {
            return view('admin.errors.notAllowed');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        Toastr()->success('تم حذف المنتج بنجاح');
        return redirect()->route('products.index');
    } //end of destroy

}
