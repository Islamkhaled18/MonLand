<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminLoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Carbon\Carbon; 
use Mail; 
use Hash;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    public function login(){

        return view('admin.auth.login');

    } // login form page

    public function postlogin(AdminLoginRequest $request)
    {
        
        $remember_me = $request->has('remember_me') ? true : false ;

        $login_type = filter_var($request->input('login'), FILTER_VALIDATE_EMAIL ) 
        ? 'email' 
        : 'phone';

        $request->merge([
            $login_type => $request->input('login')
        ]);


        if (auth()->guard('admin')->attempt($request->only($login_type, 'password','remember_me'))) {

            toastr()->success('تم الدخول الى لوحة التحكم بنجاح');
            return redirect()->route('admin.dashboard');
        }
        toastr()->error('هناك خطأ بالبيانات');
        return redirect()->back();
    }//redirect after authentication or not

    public function logout(){

        auth()->guard('admin')->logout();
        toastr()->warning('تم الخروج من لوحة التحكم بنجاح');
        return redirect()->route('admin.login');
    } //logout


    //----------------------------------------------------------------
    //                   // Forget password //                      //
    //----------------------------------------------------------------

      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitForgetPasswordForm(Request $request)
      {
        $request->validate([
            'email' => 'required|email|exists:admins',
        ]);

        $token = Str::random(64);

        DB::table('password_resets')->insert([
            'email' => $request->email, 
            'token' => $token, 
            'created_at' => Carbon::now()
        ]);

        mail::send('admin.auth.forgetPassword', ['token' => $token], function($message) use($request){
            $message->to($request->email);
            $message->subject('تعيين كلمة مرور جديده');
        });

        toastr()->warning('لقد أرسلنا رابط إعادة تعيين كلمة المرور بالبريد الإلكتروني !');
        return back();
      }
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function showResetPasswordForm($token) { 
         return view('admin.auth.forgetPasswordLink', ['token' => $token]);
      }
  
      /**
       * Write code on Method
       *
       * @return response()
       */
      public function submitResetPasswordForm(Request $request)
      {
          $request->validate([
              'email' => 'required|email|exists:admins',
              'password' => 'required|min:6',
          ]);
  
          $updatePassword = DB::table('password_resets')
                              ->where([
                                'email' => $request->email, 
                                'token' => $request->token
                              ])
                              ->first();
  
          if(!$updatePassword){
              return back()->withInput()->with('error', 'خطأ!');
          }
  
          $admin = Admin::where('email', $request->email)
                      ->update(['password' => bcrypt($request->password)]);
 
          DB::table('password_resets')->where(['email'=> $request->email])->delete();
  
          toastr()->success('لقد تم تغيير الرقم السري الخاص بك !');
          return redirect()->route('admin.login');
      }
}
