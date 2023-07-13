<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Setting;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function index()
    {
        $collection = Setting::get();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('site.contactus.index', $setting);
    }

    public function store(Request $request)
    {

        $request->validate([
            'first_name' => 'required|string|min:3|max:25',
            'last_name' => 'required|string|min:3|max:25',
            'email' => 'required|email',
            'phone' => 'required|numeric|digits:11',
            'subject' => 'required', 'max:255',
        ]);

        $contactUs = new ContactUs();
        $contactUs->first_name = $request->first_name;
        $contactUs->last_name = $request->last_name;
        $contactUs->email = $request->email;
        $contactUs->phone = $request->phone;
        $contactUs->subject = $request->subject;
        $contactUs->save();

        Toastr()->success('تم ارسال الرساله بنجاح');
        return redirect()->back();
    }
}
