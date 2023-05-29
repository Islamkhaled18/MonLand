<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use App\Models\Setting;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactUsController extends Controller
{
    public function index(){
        $collection = Setting::get();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('site.contactus.index',$setting);
    }


    public function store(Request $request){

        // return $request;

        $contactUs = new ContactUs();
        $contactUs->user_id = Auth::user()->id;
        $contactUs->subject = $request->subject;
        $contactUs->save();

        Toastr()->success('تم ارسال الرساله بنجاح');
        return redirect()->back();
    }
}
