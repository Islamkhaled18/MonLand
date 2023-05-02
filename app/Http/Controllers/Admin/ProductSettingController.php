<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ProductSettingController extends Controller
{
    public function index()
    {
        if (!Gate::allows('products')) {
            return view('admin.errors.notAllowed');
        }

        $productSettings = ProductSetting::get();
        return view('admin.productSetting.index')->with([
            'productSettings' => $productSettings,
        ]);
    } //end of index

    public function create()
    {
        if (!Gate::allows('products.create')) {
            return view('admin.errors.notAllowed');
        }

        return view('admin.productSetting.create');
    } //end of create

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'quick_request' => 'boolean',
        ]);

        $productSetting = new ProductSetting;
        $productSetting->quick_request = $validatedData['quick_request'];
        $productSetting->save();

        toastr()->success('تمت اضافة المنتج بنجاح');
        return redirect()->route('productSetting.index');
    } //end of store

    public function edit($id)
    {

        if (!Gate::allows('products.edit')) {
            return view('admin.errors.notAllowed');
        }
        $productSetting = ProductSetting::findOrFail($id);
        return view('admin.productSetting.edit', compact('productSetting'));
    }

    // public function update(Request $request, $id)
    // {
    //     $validatedData = $request->validate([
    //         'quick_request' => 'boolean',
    //     ]);

    //     $productSetting = ProductSetting::findOrFail($id);
    //     $productSetting->update($validatedData);

    //     Toastr()->success('تم التحديث بنجاح');
    //     return redirect()->route('productSetting.index');
    // }

    public function update(Request $request, $id)
    {
        $productSetting = ProductSetting::findOrFail($id);

        $validatedData = $request->validate([
            'quick_request' => 'nullable|boolean',
        ]);

        $productSetting->update([
            'quick_request' => array_key_exists('quick_request', $validatedData) ? $validatedData['quick_request'] : false,
        ]);

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('productSetting.index');
    }

}
