<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Role;
use Illuminate\Http\Request;

class AdminProfileController extends Controller
{
    public function edit($id)
    {
        $profileId = Admin::with(['profile'])->where('id', $id)->first();
        $profile = $profileId->profile;
        $roles = Role::all();
        
        return view('admin.profiles.index',compact('profile','roles','profileId'));
    }//end of edit

  
    public function update(Request $request)
    {

        $adminId = Admin::with(['profile'])->first();

        $profile = $adminId->profile;

        $adminId->update($request->all());

        $profile->update([
            'admin_id'   => auth()->user()->id,
        ]);

        Toastr()->success('تم التعديل على الصفحه الشخصيه بنجاح');
        return redirect()->back();
    }

}
