<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function store(Request $request)
    {

        $coupon = Coupon::where('code', $request->code)->first();
        if (!$coupon) {
            Toastr()->error('كود الخصم غير موجود');
            return redirect()->route('cart.index');
        }

        session()->put([
            'code' => $coupon->code,
            'value' => $coupon->value
        ]);
        Toastr()->success('تم تطبيق كود الخصم بنجاح');
        return redirect()->route('cart.index');
    }


    public function destroy()
    {

        session()->forget(['code', 'value']);

        Toastr()->warning('تم حذف كود الخصم بنجاح');
        return redirect()->route('cart.index');
    }
}
