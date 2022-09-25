<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use Illuminate\Http\Request;

class AttributeController extends Controller
{
    public function index()
    {
        $attributes = Attribute::all();
        return view('admin.attributes.index',compact('attributes'));
    }//end of index

   
    public function create()
    {
        return view('admin.attributes.create');
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
        ]);

        $attribute = new Attribute();
        $attribute->name = $request->name;
        $attribute->save();

        Toastr()->success('تم إضافة صفه معينه بنجاح');
        return redirect()->route('attributes.index');
       

    }//end of store

   
    public function edit($id)
    {
        $attribute = Attribute::findOrFail($id);
        
        return view('admin.attributes.edit',[
            'attribute'=> $attribute,
        ]);
    }//end of edit

  
    public function update(Request $request,$id)
    {
        $attribute = Attribute::findOrFail($id);
        $this->validate($request, [

            'name' => 'required|max:255',
          
        ]);

        $attribute->update([
            'name'  => $request->name,
         
            ]);

        Toastr()->success('تم التعديل على الصفة بنجاح');
        return redirect()->route('attributes.index');
    }//end of update

   
    public function destroy(Request $request, $id)
    {
        $attribute = Attribute::findOrFail($id);
        $attribute->delete();

        Toastr()->success('تم حذف الصفه بنجاح');
        return redirect()->route('attributes.index');
    
    }//end of destroy

}
