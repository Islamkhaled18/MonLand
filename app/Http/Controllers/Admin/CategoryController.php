<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(){
        $categories = Category::all();
        return view('admin.categories.index',compact('categories'));
    }//end of index

    public function create(){
        $categories = Category::select('id', 'parent_id', 'name')->get();
        return view('admin.categories.create',compact('categories'));
    }//end of create


    public function store(Request $request, Category $category)
    {

        $this->validate($request, [
            'name' => 'required',

        ]);
       
        if ($request->type == 1) {
            $request['parent_id'] = null;
        }
        $request_data = $request->except(['name', 'type']);
        $request_data['name']  = $request->name;
        Category::create($request_data);

        Toastr()->success('تم إضافة قسم جديد بنجاح');
        return redirect()->route('categories.index');
    }//end of store

    
    public function edit($id)
    {

        $category = Category::findOrFail($id);
        $categories = Category::select('id', 'parent_id', 'name')->get();
        if (!$category)
            return redirect()->route('categories.index');

        return view('admin.categories.edit', compact('category','categories'));
    }//end of edit


    public function update($id, Request $request)
    {

        $category = Category::findOrFail($id);

        if ($request->type == 1) {
            $request['parent_id'] = null;
        }

        $request_data = $request->except(['name', 'type']);
        $request_data['name']  = $request->name;
        $category->update($request_data);

        Toastr()->success('تم التعديل على القسم بنجاح');
        return redirect()->route('categories.index');
    }


    public function destroy($id)
    {
       
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr()->success('تم حذف القسم بنجاح');
        return redirect()->route('categories.index');
        
    }//end of destroy



}
