<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $about_us = Aboutus::get();
        return view('admin.about_us.index', compact('about_us'));
    } //end of index

    public function create()
    {
        return view('admin.about_us.create');
    } //end of create

    public function store(Request $request)
    {
        $request->validate([
            'text' => 'required|string|max:255',
        ]);

        $about_us = new Aboutus();
        $about_us->text = $request->text;
        $about_us->save();

        Toastr()->success('تم إضافة  عن المنظمه جديده بنجاح');
        return redirect()->route('about_us.index');

    } //end of store

    public function edit($id)
    {

        $about_us = Aboutus::findOrFail($id);

        return view('admin.about_us.edit', [
            'about_us' => $about_us,
        ]);
    } //end of edit

    public function update(Request $request, $id)
    {
        $about_us = Aboutus::findOrFail($id);
        $this->validate($request, [
            'text' => 'required|string|max:255',
        ]);
        $about_us->update([
            'text' => $request->text,
        ]);
        Toastr()->success('تم التعديل على عن المنظمه بنجاح');
        return redirect()->route('about_us.index');
    } //end of update

    public function destroy($id)
    {
        $about_us = Aboutus::findOrFail($id);
        $about_us->delete();

        Toastr()->success('تم حذف عن المنظمه بنجاح');
        return redirect()->route('about_us.index');
    } //end of destroy
}
