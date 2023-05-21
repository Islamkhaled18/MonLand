<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class BrandController extends Controller
{

    public function index()
    {
        if(!Gate::allows('brands')){
            return view('admin.errors.notAllowed');
        }
        $brands = Brand::all();
        return view('admin.brands.index',compact('brands'));
    }//end of index


    public function create()
    {
        if(!Gate::allows('brands.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.brands.create');
    }//end of create


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:255|unique:brands,id',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $data = $request->except('image');

        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('brands','images');
        }


        Brand::create($data);
        Toastr()->success('تم إضافة ماركة جديدة بنجاح');
        return redirect()->route('brands.index');

    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('brands.edit')){
            return view('admin.errors.notAllowed');
        }
        $brand = Brand::findOrFail($id);

        return view('admin.brands.edit',[
            'brand'=> $brand,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $brand = Brand::findOrFail($id);
        $request->validate([
            'name'=>'required|max:255',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $old_image = $brand->image;
        $data = $request->except('image');
        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('brands','images');
        }

        $brand->update($data);

        if($old_image && isset($data['image'])){
            Storage::disk('images')->delete($old_image);
        }

        Toastr()->success('تم التعديل على الماركة بنجاح');
        return redirect()->route('brands.index');
    }//end of update


    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('brands.destroy')){
            return view('admin.errors.notAllowed');
        }
        $brand = Brand::findOrFail($id);
        $brand->delete();

        if($brand->image){
            Storage::disk('images')->delete($brand->image);
        }

        Toastr()->success('تم حذف الماركه بنجاح');
        return redirect()->route('brands.index');

    }//end of destroy



}
