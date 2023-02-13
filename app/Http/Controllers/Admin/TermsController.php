<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TermsCondition;
use Illuminate\Http\Request;

class TermsController extends Controller
{
    public function index()
    {
        // if(!Gate::allows('DeliveryPolicy')){
        //     return view('admin.errors.notAllowed');
        // }
        $terms = TermsCondition::all();
        return view('admin.terms.index',compact('terms'));
    }//end of index

   
    public function create()
    {
        // if(!Gate::allows('DeliveryPolicy.create')){
        //     return view('admin.errors.notAllowed');
        // }
        return view('admin.terms.create');
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
        ]);

        $term = new TermsCondition();
        $term->name = $request->name;
        $term->save();

        Toastr()->success('تم إضافة شروط واحكام جديده جديده بنجاح');
        return redirect()->route('terms.index');
       
    }//end of store

   
    public function edit($id)
    {
        // if(!Gate::allows('DeliveryPolicy.edit')){
        //     return view('admin.errors.notAllowed');
        // }
        $term = TermsCondition::findOrFail($id);
        
        return view('admin.terms.edit',[
            'term'=> $term,
        ]);
    }//end of edit

  
    public function update(Request $request,$id)
    {
        $term = TermsCondition::findOrFail($id);

        $this->validate($request, [

            'name' => 'required',
          
        ]);

        $term->update([
            'name'  => $request->name,
         
            ]);

        Toastr()->success('تم التعديل على الشروط والحكام بنجاح');
        return redirect()->route('terms.index');
    }//end of update

   
    public function destroy(Request $request, $id)
    {
        // if(!Gate::allows('DeliveryPolicy.destroy')){
        //     return view('admin.errors.notAllowed');
        // }
        $term = TermsCondition::findOrFail($id);
        $term->delete();

        Toastr()->success('تم حذف شروط واحكام بنجاح');
        return redirect()->route('terms.index');
    
    }//end of destroy

}
