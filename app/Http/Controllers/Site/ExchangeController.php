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

        $this->validate($request, [

            'firstName' => 'required|string|max:255',
            'lastName' => 'required|string|max:255',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'whatsApp' => 'nullable|boolean',
            'order_number' => 'required|string|max:5',
            'order_date' => 'required|date',
            'package_number' => 'required|numeric',
            'vendor_id' => 'nullable|exists:vendors,id',
            'product_name' => 'required|string|max:255',
            'product_type' => 'required|string|max:255',
            'product_link' => 'required|string|url',
            'prouct_quantity' => 'required|numeric',
            'bill_of_lading' => 'image|mimes:jpeg,png,jpg,gif',
            'product_video' => 'nullable',
            'order_type' => 'nullable|boolean',
            'reason' => 'required|string|max:255',
            'details' => 'required|string|max:255',
        ]);



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
