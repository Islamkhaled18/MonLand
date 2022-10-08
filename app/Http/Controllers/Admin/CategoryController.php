<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

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
        if(!Gate::allows('categories.edit')){
            return view('admin.errors.notAllowed');
        }
        $category = Category::findOrFail($id);
        $categories = Category::select('id', 'parent_id', 'name')->get();
        if (!$category)
            return redirect()->route('categories.index');

        return view('admin.categories.edit', compact('category','categories'));
    }//end of edit


    public function update($id, Request $request)
    {
        $this->validate($request, [
            'name' => 'required',

        ]);

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
        if(!Gate::allows('categories.destroy')){
            return view('admin.errors.notAllowed');
        }
        $category = Category::findOrFail($id);
        $category->delete();
        Toastr()->success('تم حذف القسم بنجاح');
        return redirect()->route('categories.index');
        
    }//end of destroy

}
