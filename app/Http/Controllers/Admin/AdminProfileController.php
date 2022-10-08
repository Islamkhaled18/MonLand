<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\AdminProfile;
use App\Models\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminProfileController extends Controller
{
    public function edit($id)
    {
        $profileId = Admin::with(['profile'])->where('id', $id)->first();
        $profile = $profileId->profile;
        $roles = Role::all();
        
        return view('admin.profiles.index',compact('profile','roles','profileId'));
    }//end of edit

  
    public function update(Request $request,$id)
    {
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,'.$id,
            'phone' => 'required',
            'old_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
        ]);

        // return $request->password;
        $admin = Admin::with('profile')->findOrFail($id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        // Save The admin first
        $admin->save();

        // Now update the relation
        $admin->profile->updateOrCreate([
            'admin_id' => $admin->id,
        ]);


        Toastr()->success('تم التعديل على الصفحه الشخصيه بنجاح');
        return redirect()->back();
    }

}
