<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Laravel\Socialite\Facades\Socialite;

class SocialAuthController extends Controller
{
    private $firstName;

    private $lastName;
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
             $this->splitName($providerUser->name);
           $data = [
              'firstName' => $this->firstName,
               'lastName' =>$this->lastName,
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

    public function splitName($name){
        $fullName = explode(' ' , $name);

         if(count($fullName) == 2){

            $this->firstName = $fullName[0];

            $this->lastName = $fullName[1];

         }else if(count($fullName) == 1){

            $this->firstName = $fullName[0];

            $this->lastName = "No Name";

         }


    }

    public function createUser($data){

          return User::create($data);
    }



    public function redirectToFB()
    {
        return Socialite::driver('facebook')->redirect();
    }

    public function handleCallback()
    {
        try {
            $user = Socialite::driver('facebook')->user();
            $finduser = User::where('social_id', $user->id)->first();
             if($finduser){
                 Auth::login($finduser);
                return redirect()->route('home');
            }else{
                 $newUser = User::create([
                     'name' => $user->name,
                     'social_id'=> $user->id,
                     'social_type'=> 'facebook',
                     'avatar'=>$user->avatar,
                     'password' => encrypt('my-facebook')
                ]);
                 Auth::login($newUser);
                return redirect()->route('home');
            }
        } catch (Exception $e) {
             dd($e->getMessage());
        }
    }


}
