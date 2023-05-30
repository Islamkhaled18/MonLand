<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class WishlistController extends Controller
{

    public function index()
    {

        $favorite_products = Wishlist::with('products')
            ->where('uuid', $this->getCartId())
            ->orWhere('user_id', Auth::id())
            ->get();


        return view('site.categories.wishlist', compact('favorite_products'));
    }

    public function store(Request $request)
    {
        $uuid = $this->getCartId();
        $user_id = auth()->check() ? auth()->user()->id : null;

        if (!$uuid) {
            $uuid = Str::uuid()->toString();
            $favorite = Wishlist::create([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
                'user_id' => $user_id,
            ]);

            return response()->json('added')->cookie('favorite_uuid', $uuid, 60 * 24 * 7);
        } else {
            $favorite = Wishlist::updateOrCreate([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
            ], [
                'user_id' => $user_id,
            ]);

            if ($favorite->wasRecentlyCreated) {
                return response()->json('added')->cookie('favorite_uuid', $uuid, 60 * 24 * 7);
            } else {
                return response()->json('exists');
            }
        }
    }

    public function destroy()
    {
        Wishlist::where('uuid', '=', $this->getCartId())->orWhere('user_id', Auth::id())->delete();
        $cookie = Cookie::make('favorite_uuid', '', -60);
        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from favorites!',
        ])->cookie($cookie);

    }

    protected function getCartId()
    {
        $id = request()->cookie('favorite_uuid');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }

        return $id;
    }

}
