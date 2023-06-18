<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Governorate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GovernorateController extends Controller
{
    public function index()
    {
        if (!Gate::allows('governorate')) {
            return view('admin.errors.notAllowed');
        }
        $governorates = Governorate::all();
        return view('admin.governorates.index', compact('governorates'));
    } //end of index

    public function create()
    {
        if (!Gate::allows('governorate.create')) {
            return view('admin.errors.notAllowed');
        }

        $governorates = Governorate::select('id', 'parent_id', 'name')->where('parent_id', null)->get();
        return view('admin.governorates.create', compact('governorates'));
    } //end of create

    public function store(Request $request)
    {

        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required|exists:governorates,id',

        ]);

        if ($request->type == 1) {
            $request['parent_id'] = null;
        }

        $request_data = $request->except(['name', 'type', 'price']);

        $request_data['name'] = $request->name;
        $request_data['price'] = $request->price;
        Governorate::create($request_data);

        Toastr()->success('تم إضافة محافظة بنجاح');
        return redirect()->route('governorate.index');

    } //end of store

    public function edit($id)
    {
        if (!Gate::allows('governorate.edit')) {
            return view('admin.errors.notAllowed');
        }
        $governorate = Governorate::findOrFail($id);
        $governorates = Governorate::select('id', 'parent_id', 'name')->where('parent_id', null)->get();

        return view('admin.governorates.edit', [
            'governorate' => $governorate,
            'governorates' => $governorates,
        ]);
    } //end of edit

    public function update(Request $request, $id)
    {
        $governorate = Governorate::findOrFail($id);
        $request->validate([
            'name' => 'required|max:255',
            'parent_id' => 'required|exists:governorates,id',

        ]);

        if ($request->type == 1) {
            $request['parent_id'] = null;
        }

        $request_data = $request->except(['name', 'type']);
        $request_data['name'] = $request->name;
        $governorate->update($request_data);

        Toastr()->success('تم التعديل على المحافظه بنجاح');
        return redirect()->route('governorate.index');
    } //end of update

    public function destroy($id)
    {
        if (!Gate::allows('governorate.destroy')) {
            return view('admin.errors.notAllowed');
        }
        $governorate = Governorate::findOrFail($id);
        $governorate->delete();

        Toastr()->success('تم حذف المحافظه بنجاح');
        return redirect()->route('governorate.index');

    } //end of destroy

}
