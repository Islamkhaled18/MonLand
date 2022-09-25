<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Attribute;
use App\Models\Option;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OptionController extends Controller
{
    public function index()
    {
        $options = Option::with(['product' => function ($prod) {
            $prod->select('id','name');
        }, 'attribute' => function ($attr) {
            $attr->select('id','name');
        }])->select('id','name', 'product_id', 'attribute_id', 'price')->paginate(5);

        return view('admin.options.index', compact('options'));
    }

    public function create()
    {
        $data = [];
        $data['products'] = Product::active()->select('name')->get();
        $data['attributes'] = Attribute::select('name')->get();

        return view('admin.options.create', $data);
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        $option = new Option();
        $option->name = $request->name;
        $option->attribute_id = $request->attribute_id;
        $option->product_id = $request->product_id;
        $option->price = $request->price;
        $option->save();
        DB::commit();

        Toastr()->success('تم إضافة خصائص صفه بنجاح');
        return redirect()->route('options.index');
    }


    public function edit($optionId)
    {

        $data = [];
        $data['option'] = Option::findOrFail($optionId);
        $data['products'] = Product::select('name')->get();
        $data['attributes'] = Attribute::select('name')->get();

        return view('admin.options.edit', $data);

    }



    public function update($id, Request $request)
    {
       

        $option = Option::findOrFail($id);
        $option->update($request->only(['price','product_id','attribute_id']));
        $option->name = $request->name;
        $option->save();

        Toastr()->success('تم التحديث بنجاح');
        return redirect()->route('options.index');
     
    }

    public function destroy($id)
    {
       
        $option = Option::findOrFail($id);
        $option->delete();
        Toastr()->success('تم حذف خاصية الصفه بنجاح');
        return redirect()->route('options.index');
        
    }//end of destroy
}
