<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminRequest;
use App\Models\Admin;
use App\Models\Role;
use App\Rules\MatchOldPassword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function index()
    {

        if (!Gate::allows('admins')) {
            return view('admin.errors.notAllowed');
        }

        $admins = Admin::all();
        return view('admin.admins.index', compact('admins'));
    } //end of index

    public function create()
    {

        if (!Gate::allows('admins.create')) {
            return view('admin.errors.notAllowed');
        }
        $roles = Role::all();
        return view('admin.admins.create', compact('roles'));
    } //end of create

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required', 'max:255',
            'email' => 'required', 'email', 'unique:admins,email',
            'password' => 'required',
            'phone' => 'required',
            'role_id' => 'required|exists:roles,id',

        ]);

        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phone = $request->phone;
        $admin->password = bcrypt($request->password);
        $admin->role_id = $request->role_id;
        $admin->save();

        Toastr()->success('تم إضافة مشرف بنجاح');
        return redirect()->route('admins.index');
    } //end of store

    public function edit($id)
    {
        if (!Gate::allows('admins.edit')) {
            return view('admin.errors.notAllowed');
        }
        $admin = Admin::findOrFail($id);
        $roles = Role::all();
        return view('admin.admins.edit', [
            'admin' => $admin,
            'roles' => $roles,
        ]);

    } //end of Ediit

    public function update(Request $request, $id)
    {

        $this->validate($request, [

            'name' => 'required|max:255',
            'email' => 'required|email|unique:admins,email,' . $id,
            'phone' => 'required',
            'old_password' => 'nullable', new MatchOldPassword,
            'password' => 'nullable',
            "role_id" => 'required|numeric|exists:roles,id',
        ]);

        $admin = Admin::findOrFail($id);
        $request->merge(['password' => bcrypt($request->password)]);
        $admin->update($request->all());

        Toastr()->success('تم التعديل على المشرف بنجاح');
        return redirect()->route('admins.index');

    } //end of update

    public function destroy($id)
    {
        if (!Gate::allows('admins.destroy')) {
            return view('admin.errors.notAllowed');
        }
        $admin = Admin::findOrFail($id);
        $admin->delete();
        Toastr()->success('تم الحذف بنجاح');
        return redirect()->route('admins.index');
    } //end of destroy

}
