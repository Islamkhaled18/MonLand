<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class VendorController extends Controller
{
    public function index()
    {
        if(!Gate::allows('vendors')){
            return view('admin.errors.notAllowed');
        }
        $vendors = Vendor::all();
        return view('admin.vendors.index',compact('vendors'));
    }//end of index


    public function create()
    {
        if(!Gate::allows('vendors.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.vendors.create');
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'vendor_name'=>'required|max:255',
            'country'=>'nullable|max:255',
            'delivery_time'=>'nullable',
            'exhange_status'=>'required|max:255',
            'delivery_status'=>'required|max:255',
        ]);

        $vendor = new Vendor();
        $vendor->vendor_name = $request->vendor_name;
        $vendor->country = $request->country;
        $vendor->delivery_time = $request->delivery_time;
        $vendor->exhange_status = $request->exhange_status;
        $vendor->delivery_status = $request->delivery_status;
        $vendor->save();

        Toastr()->success('تم إضافة بائع سعر توصيل خاص به بنجاح');
        return redirect()->route('vendors.index');


    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('vendors.edit')){
            return view('admin.errors.notAllowed');
        }
        $vendor = Vendor::findOrFail($id);

        return view('admin.vendors.edit',[
            'vendor'=> $vendor,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $vendor = Vendor::findOrFail($id);
        $request->validate([
            'vendor_name'=>'required|max:255',
            'country'=>'nullable|max:255',
            'delivery_time'=>'nullable',
            'exhange_status'=>'required|max:255',
            'delivery_status'=>'required|max:255',
        ]);
    

        $vendor->update([
            'vendor_name'  => $request->vendor_name,
            'country'  => $request->country,
            'delivery_time'  => $request->delivery_time,
            'exhange_status'=> $request->exhange_status,
            'delivery_status' => $request->delivery_status,
            ]);

        Toastr()->success('تم التعديل على بائع سعر التوصيل بنجاح');
        return redirect()->route('vendors.index');
    }//end of update


    public function destroy($id)
    {
        if(!Gate::allows('vendors.destroy')){
            return view('admin.errors.notAllowed');
        }
        $vendor = Vendor::findOrFail($id);
        $products = Product::where('vendor_id', $vendor->id)->get();

        foreach ($products as $product) {
            $product->delete();
        }

        $vendor->delete();

        Toastr()->success('تم حذف بائع سعر التوصيل بنجاح');
        return redirect()->route('vendors.index');

    }//end of destroy

}
