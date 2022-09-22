<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Yoeunes\Toastr\Toastr;

class AdminController extends Controller
{
    public function index(){
        $admins = Admin::all();
        return view('admin.admins.index',compact('admins'));
    }//end of index

    public function create(){
        return view('admin.admins.create');
    }//end of create

    public function store(AdminRequest $request)
    {

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->save();

        Toastr()->success('تم إضافة مشرف بنجاح');
        return redirect()->route('admins.index');
    }//end of store

    public function edit($id){
    
        $admin = Admin::findOrFail($id);
        if(!$admin){
            Toastr()->error('لا يوجد مشرف بهذا الاسم');
            return redirect()->route('admins.index');
        }

        return view('admin.admins.edit',[
            'admin'=> $admin,
        ]);

    }//end of Ediit


    public function update(Request $request, $id)
    {
        
        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|max:255|unique:admins,email',
            'phone' => 'required',
            'password' => 'required',
        ]);

        $admin = Admin::findOrFail($id);
        $admin->update([
            'name'  => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'password' => bcrypt($request->password),
            ]);

        Toastr()->success('تم التعديل على المشرف بنجاح');
        return redirect()->route('admins.index');

    }//end of update

    
    public function destroy($id)
    {
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Toastr()->success('تم الحذف بنجاح');
        return redirect()->route('admins.index');
    }//end of destroy
        

}
