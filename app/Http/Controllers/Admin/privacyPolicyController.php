<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\privacyPolicy;
use Illuminate\Http\Request;

class privacyPolicyController extends Controller
{
    public function index()
    {
        $privacyPolicies = privacyPolicy::get();
        return view('admin.privacyPolicies.index', compact('privacyPolicies'));
    } //end of index

    public function create()
    {
        return view('admin.privacyPolicies.create');
    } //end of create

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $privacyPolicy = new privacyPolicy();
        $privacyPolicy->text = $request->text;
        $privacyPolicy->save();

        Toastr()->success('تم إضافة  سياسة الخصوصية جديده بنجاح');
        return redirect()->route('privacyPolicy.index');

    } //end of store

    public function edit($id)
    {

        $privacyPolicy = privacyPolicy::findOrFail($id);

        return view('admin.privacyPolicies.edit', [
            'privacyPolicy' => $privacyPolicy,
        ]);
    } //end of edit

    public function update(Request $request, $id)
    {
        $privacyPolicy = privacyPolicy::findOrFail($id);
        $this->validate($request, [
            'text' => 'required|string|max:255',
        ]);
        $privacyPolicy->update([
            'text' => $request->text,
        ]);
        Toastr()->success('تم التعديل على سياسة الخصوصية بنجاح');
        return redirect()->route('privacyPolicy.index');
    } //end of update

    public function destroy($id)
    {
        $privacyPolicy = privacyPolicy::findOrFail($id);
        $privacyPolicy->delete();

        Toastr()->success('تم حذف سياسة الخصوصية بنجاح');
        return redirect()->route('privacyPolicy.index');
    } //end of destroy
}
