<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductColor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class ProductColorController extends Controller
{

    public function index()
    {
        // if (!Gate::allows('productColors')) {
        //     return view('admin.errors.notAllowed');
        // }
        $colors = ProductColor::with('product')->paginate(5);

        return view('admin.productColors.index', compact('colors'));
    }

    public function create()
    {
        if (!Gate::allows('productColors.create')) {
            return view('admin.errors.notAllowed');
        }
        $products = Product::select('id', 'name')->get();

        return view('admin.productColors.create', compact('products'));
    }

    public function store(Request $request)
    {

        DB::beginTransaction();

        $request->validate([
            'name' => 'required|max:255',
        ]);
        ProductColor::create([
            'product_id' => $request->product_id,
            'name' => $request->name,
        ]);

        DB::commit();

        Toastr()->success('تم إضافة  لون منتج بنجاح');
        return redirect()->route('colors.index');
    }


    public function edit($id)
    {

        if (!Gate::allows('productColors.edit')) {
            return view('admin.errors.notAllowed');
        }
        $color = ProductColor::findOrFail($id);
        $products = Product::select('name')->get();

        return view('admin.productColors.edit', compact('color', 'products'));
    }



    public function update($id, Request $request)
    {
        $color = ProductColor::findOrFail($id);
        $this->validate($request, [

            'name' => 'required|max:255',

        ]);

        $color->update($request->all());

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('colors.index');
    }

    public function destroy($id)
    {
        if (!Gate::allows('productColors.destroy')) {
            return view('admin.errors.notAllowed');
        }

        $color = ProductColor::findOrFail($id);
        $color->delete();
        Toastr()->success('تم حذف لون منتج بنجاح');
        return redirect()->route('colors.index');
    } //end of destroy
}
