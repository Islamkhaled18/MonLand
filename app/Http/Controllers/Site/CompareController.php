<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $products =  auth()->user()->comparelist()->latest()->paginate(2);
        return view('site.categories.compare', compact('products'));
    }

    public function store()
    {

        if (!auth()->user()->comparelistHas(request('productId'))) {
            auth()->user()->comparelist()->attach(request('productId'));
            return response()->json(['status' => true, 'compared' => true]);
        }
        return response()->json(['status' => true, 'compared' => false]);  // added before we can use enumeration here
    }


    public function destroy()
    {
        auth()->user()->comparelist()->detach(request('product_id'));
    }
}
