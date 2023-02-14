<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Vendor;
use Illuminate\Http\Request;

class CompareController extends Controller
{
    public function index()
    {
        $products =  auth()->user()->comparelist()->latest()->paginate(2);

        foreach($products as $product){
            $reviews = Product::with('reviews')->where('id',$product->id)->get();
            $reviewsCount = $product->reviews()->count();
    
            $progresseData =  [];
            if($reviewsCount > 0){
            $progresseData =  [
        
                '1' => $product->reviews()->where('star_rating', 1)->count() / $reviewsCount *100 ,
                '2' => $product->reviews()->where('star_rating', 2)->count() / $reviewsCount *100,
                '3' => $product->reviews()->where('star_rating', 3)->count() / $reviewsCount *100,
                '4' => $product->reviews()->where('star_rating', 4)->count() / $reviewsCount *100,
                '5' => $product->reviews()->where('star_rating', 5)->count() / $reviewsCount *100,
                ];
        
            }else{
                $reviewsCount = 0;
            }
    
            $average =  $reviewsCount ? round($product->reviews()->sum('star_rating') / $reviewsCount ,2) : 0;
            $vendor = Vendor::where('id', $product->vendor_id)->first();
    
            $productsWithRatingOne = $product->reviews()->where('star_rating', 1)->count();
            $productsWithRatingTwo = $product->reviews()->where('star_rating', 2)->count();
            $productsWithRatingThree = $product->reviews()->where('star_rating', 3)->count();
            $productsWithRatingFour = $product->reviews()->where('star_rating', 4)->count();
            $productsWithRatingFive = $product->reviews()->where('star_rating', 5)->count();
        }



        return view('site.categories.compare', compact('products','reviews','average','vendor','productsWithRatingOne',
        'productsWithRatingTwo','productsWithRatingThree','productsWithRatingFour','productsWithRatingFive'
        ));
    }

    public function store()
    {

        if (!auth()->user()->comparelistHas(request('productId'))) {
            auth()->user()->comparelist()->attach(request('productId'));
            return response()->json(['status' => true, 'compared' => true]);
        }
        return response()->json(['status' => true, 'compared' => false]);  // added before we can use enumeration here
    }


    public function destroy()
    {
        auth()->user()->comparelist()->detach(request('product_id'));
    }
}
