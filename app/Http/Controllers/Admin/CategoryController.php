<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\MainCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;


class CategoryController extends Controller
{
    public function index(){
        if(!Gate::allows('categories')){
            return view('admin.errors.notAllowed');
        }
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }//end of index

    public function create(){
        if(!Gate::allows('categories.create')){
            return view('admin.errors.notAllowed');
        }
        $categories = Category::select('id', 'parent_id', 'name')->get();
        $mainCategories = MainCategory::all();

        return view('admin.categories.create',compact('categories','mainCategories'));
    }//end of create

    public function store(Request $request, Category $category)
    {

        $this->validate($request, [
            'name' => 'required',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',

        ]);

        if ($request->type == 1) {
            $request['parent_id'] = null;
        }
        $request_data = $request->except(['name', 'type','image']);

        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $request_data['image'] = $image->store('categories','images');
        }

        $request_data['name']  = $request->name;
        Category::create($request_data);

        Toastr()->success('تم إضافة قسم جديد بنجاح');
        return redirect()->route('categories.index');
    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('categories.edit')){
            return view('admin.errors.notAllowed');
        }
        $category = Category::findOrFail($id);
        $mainCategory = MainCategory::all();
        $mainCategories = MainCategory::all();
        $categories = Category::select('id', 'parent_id', 'name')->get();
        if (!$category)
            return redirect()->route('categories.index');

        return view('admin.categories.edit', compact('category','categories','mainCategory','mainCategories'));
    }//end of edit


    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'image'=>'mimes:png,jpg,bmp,jpeg,webp',

        ]);

        $category = Category::findOrFail($id);

        $old_image = $category->image;


        if ($request->type == 1) {
            $request['parent_id'] = null;
        }

        $request_data = $request->except(['name', 'type','image']);
        if( $request->hasFile('image') && $request->file('image')->isValid()){
            $image = $request->file('image');
            $request_data['image'] = $image->store('categories','images');
        }

        $request_data['name']  = $request->name;
        $category->update($request_data);


        if($old_image && isset($request_data['image'])){
            Storage::disk('images')->delete($old_image);
        }

        Toastr()->success('تم التعديل على القسم بنجاح');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
        if(!Gate::allows('categories.destroy')){
            return view('admin.errors.notAllowed');
        }
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr()->success('تم حذف القسم بنجاح');
        return redirect()->route('categories.index');

    }//end of destroy

}
