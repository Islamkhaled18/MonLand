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
        Product::whereId($request -> product_id) -> update($request-> except(['_token','product_id']));
        toastr()->success('تمت اضافة بيانات على المنتج بنجاح');
        return redirect()->route('products.index');
    }//end of saveProductStock


    public function addImages($product_id){
        if(!Gate::allows('products.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.products.images.create')->with('id',$product_id) ;
    }

    //to save images to folder only
    public function saveProductImages(Request $request ){

        $file = $request->file('dzfile');
        $filename = uploadImage('products', $file);

        return response()->json([
            'name' => $filename,
            'original_name' => $file->getClientOriginalName(),
        ]);

    }

    public function saveProductImagesDB(Request $request){

        // save dropzone images
        if ($request->has('document') && count($request->document) > 0) {
            foreach ($request->document as $image) {
                Image::create([
                    'product_id' => $request->product_id,
                    'photo' => $image,
                ]);
            }
        }
        toastr()->success('تمت اضافة صور بنجاح');
        return redirect()->route('products.index');
    }


    public function destroy($id)
    {
        if(!Gate::allows('products.destroy')){
            return view('admin.errors.notAllowed');
        }

        $product = Product::findOrFail($id);
        $product->delete();

        if($product->image){
            Storage::disk('images')->delete($product->photo);
        }
        Toastr()->success('تم حذف المنتج بنجاح');
        return redirect()->route('products.index');
    
    }//end of destroy

}
