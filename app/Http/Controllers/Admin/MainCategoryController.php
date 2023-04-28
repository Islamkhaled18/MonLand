<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class MainCategoryController extends Controller
{
    public function index()
    {
        if(!Gate::allows('mainCategories')){
            return view('admin.errors.notAllowed');
        }
        $mainCategories = MainCategory::all();
        return view('admin.mainCategories.index',compact('mainCategories'));
    }//end of index


    public function create()
    {
        if(!Gate::allows('mainCategories.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.mainCategories.create');
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $mainCategory = new MainCategory();
        $mainCategory->name = $request->name;
        $mainCategory->save();

        Toastr()->success('تم إضافة قسم رئيسي بنجاح بنجاح');
        return redirect()->route('mainCategories.index');


    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('mainCategories.edit')){
            return view('admin.errors.notAllowed');
        }
        $mainCategory = MainCategory::findOrFail($id);

        return view('admin.mainCategories.edit',[
            'mainCategory'=> $mainCategory,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $mainCategory = MainCategory::findOrFail($id);
        $this->validate($request, [

            'name' => 'required|max:255',

        ]);

        $mainCategory->update([
            'name'  => $request->name,

            ]);

        Toastr()->success('تم التعديل على القسم الرئيسي بنجاح');
        return redirect()->route('mainCategories.index');
    }//end of update


    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('mainCategories.destroy')){
            return view('admin.errors.notAllowed');
        }
        $mainCategory = MainCategory::findOrFail($id);
        $mainCategory->delete();

        Toastr()->success('تم حذف قسم رئيسي بنجاح');
        return redirect()->route('mainCategories.index');

    }//end of destroy

}
