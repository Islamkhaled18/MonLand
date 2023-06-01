<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Compare;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Str;

class CompareController extends Controller
{
   
    public function index()
    {

        $compare_products = Compare::with('products')
            ->where(function ($query) {
                $query->where('uuid', $this->getCartId())
                    ->orWhere('user_id', Auth::id());
            })
            ->get();

        // foreach ($products as $product) {
        //     $reviews = Product::with('reviews')->where('id', $product->id)->get();
        //     $reviewsCount = $product->reviews()->count();

        //     $progresseData = [];
        //     if ($reviewsCount > 0) {
        //         $progresseData = [

        //             '1' => $product->reviews()->where('star_rating', 1)->count() / $reviewsCount * 100,
        //             '2' => $product->reviews()->where('star_rating', 2)->count() / $reviewsCount * 100,
        //             '3' => $product->reviews()->where('star_rating', 3)->count() / $reviewsCount * 100,
        //             '4' => $product->reviews()->where('star_rating', 4)->count() / $reviewsCount * 100,
        //             '5' => $product->reviews()->where('star_rating', 5)->count() / $reviewsCount * 100,
        //         ];

        //     } else {
        //         $reviewsCount = 0;
        //     }

        //     $average = $reviewsCount ? round($product->reviews()->sum('star_rating') / $reviewsCount, 2) : 0;
        //     $vendor = Vendor::where('id', $product->vendor_id)->first();

        //     $productsWithRatingOne = $product->reviews()->where('star_rating', 1)->count();
        //     $productsWithRatingTwo = $product->reviews()->where('star_rating', 2)->count();
        //     $productsWithRatingThree = $product->reviews()->where('star_rating', 3)->count();
        //     $productsWithRatingFour = $product->reviews()->where('star_rating', 4)->count();
        //     $productsWithRatingFive = $product->reviews()->where('star_rating', 5)->count();
        // }

        // return view('site.categories.compare', compact('products', 'reviews', 'average', 'vendor', 'productsWithRatingOne',
        //     'productsWithRatingTwo', 'productsWithRatingThree', 'productsWithRatingFour', 'productsWithRatingFive'
        // ));
        return view('site.categories.compare', compact('compare_products'));
    }

    public function store(Request $request)
    {
        $uuid = $this->getCartId();
        $user_id = auth()->check() ? auth()->user()->id : null;

        // Check if the user has already added two products
        $compareCount = Compare::where('user_id', $user_id)->count();
        if ($compareCount >= 2) {
            return response()->json('limit_reached');
        }

        if (!$uuid) {
            $uuid = Str::uuid()->toString();
            $compare = Compare::create([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
                'user_id' => $user_id,
            ]);
            return response()->json('added')->cookie('compare_uuid', $uuid, 60 * 24 * 7);
        } else {
            $compare = Compare::updateOrCreate([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
            ], [
                'user_id' => $user_id,
            ]);
        }

        if ($compare->wasRecentlyCreated) {
            return response()->json('added')->cookie('compare_uuid', $uuid, 60 * 24 * 7);
        } else {
            return response()->json('exists');
        }
    }

    public function destroy()
    {
        Compare::where('uuid', '=', $this->getCartId())->orWhere('user_id', Auth::id())->delete();
        $cookie = Cookie::make('compare_uuid', '', -60);
        return response()->json([
            'status' => 'success',
            'message' => 'Product removed from compares!',
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
