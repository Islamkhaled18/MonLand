<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class SettingController extends Controller
{
    public function index()
    {
        // if(!Gate::allows('settings')){
        //     return view('admin.errors.notAllowed');
        // }

        $collection = Setting::all();
        $setting['setting'] = $collection->flatMap(function ($collection) {
            return [$collection->key => $collection->value];
        });
        return view('admin.settings.index', $setting);
    }

    public function update(Request $request)
    {

        $info = $request->except('_token', '_method');
        foreach ($info as $key => $value) {
            Setting::where('key', $key)->update(['value' => $value]);
        }
        toastr()->success('تم التعديل على الاعدادات');
        return redirect()->back();

    }
}
