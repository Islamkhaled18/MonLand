<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DeliveryPriceRequest;
use App\Models\DeliveryPrice;
use App\Models\Governorate;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeliveryPriceController extends Controller
{
    public function index()
    {

        if (!Gate::allows('vendors')) {
            return view('admin.errors.notAllowed');
        }

        $delivery_prices = DeliveryPrice::with('vendor', 'governorate')->get();

        return view('admin.DeliveryPrice.index', compact('delivery_prices'));
    } //end of index

    public function create()
    {
        if (!Gate::allows('vendors.create')) {
            return view('admin.errors.notAllowed');
        }
        $vendors = Vendor::get();
        $governorates = Governorate::where('parent_id', null)->get();

        return view('admin.DeliveryPrice.create', compact('vendors', 'governorates'));
    }

    public function store(DeliveryPriceRequest $request)
    {
        $validatedData = $request->validated();

        $existingRecord = DeliveryPrice::where('vendor_id', $validatedData['vendor_id'])
            ->where('governorate_id', $validatedData['governorate_id'])
            ->first();

        if ($existingRecord) {
            return redirect()->back()->with("message", "تم اضافة هذا البائع مع هذه المحافظه من قبل ");
        }

        DeliveryPrice::create($validatedData);
        return redirect()->route('deliveryPrice.index')->with("message", "تم إضافة سعر توصيل للمحافظات بنجاح");
    }

    public function edit($id)
    {
        if (!Gate::allows('vendors.edit')) {
            return view('admin.errors.notAllowed');
        }
        $delivery_price = DeliveryPrice::findOrFail($id);

        $vendors = Vendor::get();
        $governorates = Governorate::where('parent_id', null)->get();

        return view('admin.DeliveryPrice.edit', compact('vendors', 'governorates', 'delivery_price'));
    }


    public function update(DeliveryPriceRequest $request, $id)
    {
        $validatedData = $request->validated();
        $existingRecord = DeliveryPrice::findOrFail($id);
        if (!$existingRecord) {
            Toastr()->error('الحقل غير موجود');
            return redirect()->back()->withInput();
        }
        $duplicateRecord = DeliveryPrice::where('vendor_id', $validatedData['vendor_id'])
            ->where('governorate_id', $validatedData['governorate_id'])
            ->where('id', '!=', $id)
            ->first();
        if ($duplicateRecord) {
            return redirect()->back()->with("message", "تم اضافة هذا البائع مع هذه المحافظه من قبل ");

        }
        $existingRecord->update($validatedData);
        Toastr()->success('تم تحديث سعر التوصيل بنجاح');
        return redirect()->route('deliveryPrice.index');
    }

    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('vendors.destroy')){
            return view('admin.errors.notAllowed');
        }
        $delivery_price = DeliveryPrice::findOrFail($id);
        $delivery_price->delete();

        Toastr()->success('تم حذف سعر توصيل للمحافظه بنجاح');
        return redirect()->route('deliveryPrice.index');

    }//end of destroy

}
