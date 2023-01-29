<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use App\Models\Vendor;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function create()
    {
        $vendors = Vendor::get();
        return view('site.sale.exchange', compact('vendors'));
    }

    public function store(Request $request)
    {

        $data = $request->except('bill_of_lading', 'product_video');

        if ($request->hasFile('bill_of_lading') && $request->file('bill_of_lading')->isValid()) {
            $bill_of_lading = $request->file('bill_of_lading');
            $data['bill_of_lading'] = $bill_of_lading->store('Exhange', 'images');
        }
        if ($request->hasFile('product_video') && $request->file('product_video')->isValid()) {
            $product_video = $request->file('product_video');
            $data['product_video'] = $product_video->store('Exhange', 'images');
        }


        Exchange::create($data);
        return redirect()->back();
    }
}
