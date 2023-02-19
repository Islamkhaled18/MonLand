<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;


class CouponController extends Controller
{
    public function index()
    {
        if(!Gate::allows('coupons')){
            return view('admin.errors.notAllowed');
        }
        $coupons = Coupon::all();
        return view('admin.coupons.index',compact('coupons'));
    }//end of index


    public function create()
    {
        if(!Gate::allows('coupons.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.coupons.create');
    }//end of create


    public function store(Request $request)
    {
        $request->validate([
            'code'=>'required|max:255',
            'value'=>'required|integer',
        ]);

        $coupon = new Coupon();
        $coupon->code = $request->code;
        $coupon->value = $request->value;
        $coupon->save();

        Toastr()->success('تم إضافة كود خصم بنجاح');
        return redirect()->route('coupon.index');


    }//end of store


    public function edit($id)
    {
        if(!Gate::allows('coupons.edit')){
            return view('admin.errors.notAllowed');
        }
        $coupon = Coupon::findOrFail($id);

        return view('admin.coupons.edit',[
            'coupon'=> $coupon,
        ]);
    }//end of edit


    public function update(Request $request,$id)
    {
        $coupon = Coupon::findOrFail($id);
        $this->validate($request, [

            'code'=>'required|max:255',
            'value'=>'required',

        ]);

        $coupon->update([
            'code'  => $request->code,
            'value'  => $request->value,

            ]);

        Toastr()->success('تم التعديل على كوبون الخصم بنجاح');
        return redirect()->route('coupon.index');
    }//end of update


    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('coupons.destroy')){
            return view('admin.errors.notAllowed');
        }
        $coupon = Coupon::findOrFail($id);
        $coupon->delete();

        Toastr()->success('تم حذف كوبون الخصم بنجاح');
        return redirect()->route('coupon.index');

    }//end of destroy
}
