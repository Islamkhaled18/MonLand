<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Compare;
use App\Models\Wishlist;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
     */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    protected function authenticated(Request $request, $user)
    {
        $wishlistUuid = $this->getCartIdFav();
        $compareUuid = $this->getCartIdCompare();
        $cartUuid = $this->getCartId();

        if ($wishlistUuid) {
            Wishlist::where('uuid', $wishlistUuid)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);
        }

        if ($compareUuid) {
            Compare::where('uuid', $compareUuid)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);
        }

        if ($cartUuid) {
            Cart::where('uuid', $cartUuid)
                ->whereNull('user_id')
                ->update(['user_id' => $user->id]);
        }

        return redirect()->intended($this->redirectPath());
    }

    protected function getCartIdFav()
    {
        $id = request()->cookie('favorite_uuid');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('favorite_id', $id, 60 * 24 * 7);
        }

        return $id;
    }

    protected function getCartIdCompare()
    {
        $id = request()->cookie('compare_id');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('compare_id', $id, 60 * 24 * 7);
        }

        return $id;
    }

    protected function getCartId()
    {
        $id = request()->cookie('cart_uuid');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_uuid', $id, 60 * 24 * 7);
        }

        return $id;
    }

}
