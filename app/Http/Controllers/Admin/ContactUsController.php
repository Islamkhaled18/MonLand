<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class ContactUsController extends Controller
{
    public function index()
    {
        if(!Gate::allows('contactus')){
            return view('admin.errors.notAllowed');
        }
        $contactUs = ContactUs::all();
        return view('admin.contactus.index',compact('contactUs'));
    }//end of index

    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('contactus.destroy')){
            return view('admin.errors.notAllowed');
        }
        $contactUs = ContactUs::findOrFail($id);
        $contactUs->delete();

        Toastr()->success('تم حذف الرساله بنجاح');
        return redirect()->route('ContactUs.index');

    }//end of destroy

}
