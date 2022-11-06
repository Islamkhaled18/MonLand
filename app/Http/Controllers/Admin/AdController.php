<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ad;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;

class AdController extends Controller
{
    public function index()
    {
        if(!Gate::allows('ads')){
            return view('admin.errors.notAllowed');
        }
        $ads = Ad::all();
        return view('admin.ads.index',compact('ads'));
    }//end of index


    public function create()
    {
        if(!Gate::allows('ads.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.ads.create');
    }//end of create


    public function store(Request $request)
    {

        $request->validate([
            'name'=>'required|max:255',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $data = $request->except('image');

        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('ads','images');
        }


        Ad::create($data);
        Toastr()->success('تم إضافة صورة اعلان جديدة بنجاح');
        return redirect()->route('ads.index');

    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('ads.edit')){
            return view('admin.errors.notAllowed');
        }
        $ad = Ad::findOrFail($id);

        return view('admin.ads.edit',[
            'ad'=> $ad,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $ad = Ad::findOrFail($id);
        $request->validate([
            'name'=>'required|max:255',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',
        ]);

        $old_image = $ad->image;
        $data = $request->except('image');
        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $data['image'] = $image->store('ad','images');
        }

        $ad->update($data);

        if($old_image && isset($data['image'])){
            Storage::disk('images')->delete($old_image);
        }

        Toastr()->success('تم التعديل على صورة اعلان بنجاح');
        return redirect()->route('ads.index');
    }//end of update


    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('ads.destroy')){
            return view('admin.errors.notAllowed');
        }
        $ad = Ad::findOrFail($id);
        $ad->delete();

        if($ad->image){
            Storage::disk('images')->delete($ad->image);
        }

        Toastr()->success('تم حذف صورة الاعلان بنجاح');
        return redirect()->route('ads.index');

    }//end of destroy

}
