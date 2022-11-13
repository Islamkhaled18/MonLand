<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EmailUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class EmailUsController extends Controller
{
    public function index()
    {
        if(!Gate::allows('emailUs')){
            return view('admin.errors.notAllowed');
        }
        $emailUs = EmailUs::all();
        return view('admin.emailus.index',compact('emailUs'));
    }//end of index

    public function store(Request $request){

        $emailUs = new EmailUs();
        $emailUs->user_id = Auth::user()->id;
        $emailUs->save();

        return redirect()->back();
    }


    public function destroy(Request $request, $id)
    {
        if(!Gate::allows('emailUs.destroy')){
            return view('admin.errors.notAllowed');
        }
        $EmailUs = EmailUs::findOrFail($id);
        $EmailUs->delete();

        Toastr()->success('تم حذف المتابعه بنجاح');
        return redirect()->route('emailUs.index');

    }//end of destroy
}
