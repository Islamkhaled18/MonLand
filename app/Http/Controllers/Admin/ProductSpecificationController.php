<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProductSpecification;
use Illuminate\Http\Request;

class ProductSpecificationController extends Controller
{

    public function create($id)
    {
        $product = Product::findOrFail($id);

        return view('admin.productSpecification.create', compact('product'));
    }

    public function store(Request $request, $id)
    {
        $product = Product::findOrFail($id);
        $specification = new ProductSpecification();
        $specification->product_id = $product->id;
        $specification->spec_key = $request->spec_key;
        $specification->spec_value = $request->spec_value;
        $specification->save();

        return redirect()->back()->with('success', 'Product specifications created successfully.');
    }


}
