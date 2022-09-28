<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class RoleController extends Controller
{
    public function index(){

        if(!Gate::allows('roles')){
            return view('admin.errors.notAllowed');
        }

        return view('admin.roles.index',[
            'roles'=> Role::paginate(5)
        ]);
    }

    public function create(){
        if(!Gate::allows('roles.create')){
            return view('admin.errors.notAllowed');
        }
        return view('admin.roles.create');
    }

    public function store(Request $request){
        $request->validate([
            'name' =>'required'
        ]);

        $role = new Role();
        $role->name = $request->name;
        $role->save();
         
        foreach($request->post('permissions', []) as $permission ){

            $role->permissions()->create([
               'permission' => $permission 
            ]);
        }

        Toastr()->success('تم إضافة اوامر وصلاحيات جديدة بنجاح');
        return redirect()->route('roles.index');
    }

    public function edit($id)
    {
        if(!Gate::allows('roles.edit')){
            return view('admin.errors.notAllowed');
        }
        $role = Role::findOrFail($id);
        
        return view('admin.roles.edit',[
            'role'=> $role,
        ]);
    }//end of edit

  
    public function update(Request $request,$id)
    {

        $role = Role::findOrFail($id);
        $this->validate($request, [
            'name'=>'required',
        ]);
        
        $role->update([
            'name'  => $request->name,
            
        ]);

        $role->permissions()->delete();
        
        foreach($request->post('permissions', []) as $permission){

            $role->permissions()->create([
                'permission' => $permission 
            ]);
        }

        Toastr()->success('تم التعديل على  اوامر وصلاحيات بنجاح');
        return redirect()->route('roles.index');
    }//end of update



    public function destroy($id){

        if(!Gate::allows('roles.destroy')){
            return view('admin.errors.notAllowed');
        }

        $role = Role::findOrFail($id);
        $role->delete();
        Toastr()->success('تم حذف اوامر وصلاحيات  بنجاح');
        return redirect()->route('roles.index');

    }
}
