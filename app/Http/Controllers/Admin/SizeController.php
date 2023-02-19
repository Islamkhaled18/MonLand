<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Size;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class SizeController extends Controller
{
    public function index()
    {
        // if(!Gate::allows('ads')){
        //     return view('admin.errors.notAllowed');
        // }
        $sizes = Size::get();
        return view('admin.sizes.index',compact('sizes'));
    }//end of index


    public function create()
    {

        // if(!Gate::allows('ads.create')){
        //     return view('admin.errors.notAllowed');
        // }
        return view('admin.sizes.create');
    }//end of create


    public function store(Request $request)
    {

        // dd($request);

        $request->validate([
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $data = $request->except('image');

        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('sizes','images');
        }


        Size::create($data);
        Toastr()->success('تم إضافة جدول المقاسات بنجاح');
        return redirect()->route('size.index');

    }//end of store


    public function edit($id)
    {
        // if(!Gate::allows('ads.edit')){
        //     return view('admin.errors.notAllowed');
        // }
        $size = Size::findOrFail($id);

        return view('admin.sizes.edit',[
            'size'=> $size,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $size = Size::findOrFail($id);
        $request->validate([
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $old_image = $size->image;
        $data = $request->except('image');
        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('sizes','images');
        }

        $size->update($data);

        if($old_image && isset($data['image'])){
            Storage::disk('images')->delete($old_image);
        }

        Toastr()->success('تم التعديل على صورة جدول المقاسات بنجاح');
        return redirect()->route('size.index');
    }//end of update


    public function destroy(Request $request, $id)
    {
        // if(!Gate::allows('ads.destroy')){
        //     return view('admin.errors.notAllowed');
        // }
        $size = Size::findOrFail($id);
        $size->delete();

        if($size->image){
            Storage::disk('images')->delete($size->image);
        }

        Toastr()->success('تم حذف صورة جدول المقاسات بنجاح');
        return redirect()->route('size.index');

    }//end of destroy
}
