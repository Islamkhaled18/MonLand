<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Exchange;
use Illuminate\Http\Request;

class ExchangeController extends Controller
{
    public function index()
    {
        $exchanges = Exchange::get();
        return view('admin.exchange.index',compact('exchanges'));
    }

    public function show($id)
    {
        $exchange = Exchange::where('id',$id)->first();
        return view('admin.exchange.show',compact('exchange'));
    }
    public function delete($id)
    {
        $exchange = Exchange::findOrFail($id);
        $exchange->delete();
        Toastr()->success('تم الحذف بنجاح');
        return redirect()->route('exchanges.index');

    }
}
