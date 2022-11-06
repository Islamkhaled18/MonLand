<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DeliveryPolicy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeliveryPolicyController extends Controller
{
    public function index()
    {
        if(!Gate::allows('DeliveryPolicy')){
            return view('admin.errors.notAllowed');
        }
        $deliveryPolicies = DeliveryPolicy::all();
        return view('admin.deliveypolicy.index',compact('deliveryPolicies'));
    }//end of index

   
    public function create()
    {
        if(!Gate::allows('DeliveryPolicy.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.deliveypolicy.create');
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'policy'=>'required',
        ]);

        $DeliveryPolicy = new DeliveryPolicy();
        $DeliveryPolicy->policy = $request->policy;
        $DeliveryPolicy->save();

        Toastr()->success('تم إضافة سياسة شحن جديده بنجاح');
        return redirect()->route('DeliveryPolicy.index');
       
    }//end of store

   
    public function edit($id)
    {
        if(!Gate::allows('DeliveryPolicy.edit')){
            return view('admin.errors.notAllowed');
        }
        $DeliveryPolicy = DeliveryPolicy::findOrFail($id);
        
        return view('admin.deliveypolicy.edit',[
            'DeliveryPolicy'=> $DeliveryPolicy,
        ]);
    }//end of edit

  
    public function update(Request $request,$id)
    {
        $DeliveryPolicy = DeliveryPolicy::findOrFail($id);
        $this->validate($request, [

            'policy' => 'required',
          
        ]);

        $DeliveryPolicy->update([
            'policy'  => $request->policy,
         
            ]);

        Toastr()->success('تم التعديل على ساسية الشحن بنجاح');
        return redirect()->route('DeliveryPolicy.index');
    }//end of update

   
    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('DeliveryPolicy.destroy')){
            return view('admin.errors.notAllowed');
        }
        $DeliveryPolicy = DeliveryPolicy::findOrFail($id);
        $DeliveryPolicy->delete();

        Toastr()->success('تم حذف سياسة الشحن بنجاح');
        return redirect()->route('DeliveryPolicy.index');
    
    }//end of destroy

}
