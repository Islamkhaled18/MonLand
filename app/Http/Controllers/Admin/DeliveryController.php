<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeliveryController extends Controller
{
    public function index()
    {
        if(!Gate::allows('delivery')){
            return view('admin.errors.notAllowed');
        }
        $deliveries = Delivery::all();
        return view('admin.delivery.index',compact('deliveries'));
    }//end of index

   
    public function create()
    {
        if(!Gate::allows('delivery.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.delivery.create');
    }//end of create

    
    public function store(Request $request)
    {
        $request->validate([
            'governorate_name'=>'required|max:255',
            'delivery_price'=>'required|max:255',
        ]);

        $delivery = new Delivery();
        $delivery->governorate_name = $request->governorate_name;
        $delivery->delivery_price = $request->delivery_price;
        $delivery->save();

        Toastr()->success('تم إضافة سعر توصيل بنجاح');
        return redirect()->route('delivery.index');
       

    }//end of store

   
    public function edit($id)
    {
        if(!Gate::allows('delivery.edit')){
            return view('admin.errors.notAllowed');
        }
        $delivery = Delivery::findOrFail($id);
        
        return view('admin.delivery.edit',[
            'delivery'=> $delivery,
        ]);
    }//end of edit

  
    public function update(Request $request,$id)
    {
        $delivery = Delivery::findOrFail($id);
        $this->validate($request, [

            'governorate_name'=>'required|max:255',
            'delivery_price'=>'required|max:255',
          
        ]);

        $delivery->update([
            'governorate_name'  => $request->governorate_name,
            'delivery_price'  => $request->delivery_price,
         
            ]);

        Toastr()->success('تم التعديل على سعر التوصيل بنجاح');
        return redirect()->route('delivery.index');
    }//end of update

   
    public function destroy($id)
    {
        if(!Gate::allows('delivery.destroy')){
            return view('admin.errors.notAllowed');
        }
        $delivery = Delivery::findOrFail($id);
        $delivery->delete();

        Toastr()->success('تم حذف سعر التوصيل بنجاح');
        return redirect()->route('delivery.index');
    
    }//end of destroy

}
