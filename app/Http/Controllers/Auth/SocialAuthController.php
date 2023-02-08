<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    public function redirect($provider){

        return Socialite::driver($provider)->redirect();
    }


    public function callBack($provider){

        $providerUser =  Socialite::driver($provider)->user();
    
       $sysUser =  $this->isUserExist($providerUser->email);
         
        if($sysUser){
             
              $sysUser->update([
                 'provider' => $provider,
                 'provider_id' => $providerUser->id,
                 'provider_token' => $providerUser->token,
              ]);

                
              Auth::login($sysUser);


              return redirect()->route('home');



        }else{


           $data = [
              'firstName' => $providerUser->user['given_name'],

               'lastName' =>$providerUser->user['family_name'] ,

               'email' => $providerUser->email,

               'password' => Hash::make(Str::random(20)),

               'provider' => $provider,
               
                'gender' => "Male",
               'provider_id' => $providerUser->id,

               'provider_token' => $providerUser->token,
           ];

            $newUser = $this->createUser($data);

            Auth::login($newUser);


            return redirect()->route('home');

        }


        return back()->withErrors(["message" => "خطأ في تسجيل الدخول الرجاء المحاوله مره اخري"]);

    }






  



    public function isUserExist($email){
        
         $user = User::where('email' , $email)->first();

         return $user;

    }


    public function createUser($data){

          return User::create($data);
    }











}
