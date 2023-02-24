<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Productsize;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductSizeController extends Controller
{

    public function index()
    {
        if(!Gate::allows('productSizes')){
            return view('admin.errors.notAllowed');
        }
        $sizes = Productsize::with('product')->paginate(5);

        return view('admin.productSizes.index', compact('sizes'));
    }

    public function create()
    {
        if(!Gate::allows('productSizes.create')){
            return view('admin.errors.notAllowed');
        }
        $products = Product::select('id','name')->get();

        return view('admin.productSizes.create', compact('products'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        $request->validate([
            'name'=>'required|max:255',
        ]);
        Productsize::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
        ]);

        DB::commit();

        Toastr()->success('تم إضافة  مقاس منتج بنجاح');
        return redirect()->route('sizes.index');
    }


    public function edit($id)
    {

        if(!Gate::allows('productSizes.edit')){
            return view('admin.errors.notAllowed');
        }
        $size = Productsize::findOrFail($id);
        $products = Product::select('name')->get();

        return view('admin.productSizes.edit', compact('size','products'));

    }



    public function update($id, Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $color = Productsize::findOrFail($id);
        $color->update($request->only(['product_id','name']));
        $color->save();

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('sizes.index');

    }

    public function destroy($id)
    {
        if(!Gate::allows('productSizes.destroy')){
            return view('admin.errors.notAllowed');
        }

        $size = Productsize::findOrFail($id);
        $size->delete();
        Toastr()->success('تم حذف لون منتج بنجاح');
        return redirect()->route('sizes.index');

    }//end of destroy
}
