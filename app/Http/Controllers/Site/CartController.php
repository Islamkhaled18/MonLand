<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Governorate;
use App\Models\Order;
use App\Models\OrderProduct;
use App\Models\Product;
use App\Models\Review;
use App\Models\Vendor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Validation\ValidationException;
use Throwable;
use Yoeunes\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        // $products = Vendor::with(['carts' => function ($query) use ($user) {
        //     $query->where('carts.user_id', $user->id);
        //     $query->with(['products' => function ($products) {
        //         $products->get();
        //     }]);
        // }])->get();
        /////////////////////////////////////////////////////
        // $products = Product::whereExists(function ($query) use ($user) {
            //     $query->select(DB::raw(1))
            //           ->from('carts as c')
            //           ->whereRaw('products.id = c.product_id')
            //           ->where('c.user_id', $user->id);
            // })
            // ->with('vendor')
            // ->get();
            
            // foreach ($products as $product) {
                //     $vendor = $product->vendor;
                //     // do something with the vendor and product information
                // }
                //////////////////////////////////////////
                
                ///////////////////////////////////////////////////
                $products = Vendor::with(['carts' => function ($query) use ($user) {
                    $query->where('carts.user_id', $user->id);
                    $query->with(['products' => function ($products) {
                        $products->get();
                    }]);
                }])
                ->whereHas('carts.products', function ($query) {
                    $query->whereNull('products.deleted_at');
                })
                ->get();


                $vendors_cart_count = Vendor::with(['carts' => function ($query) use ($user) {
                    $query->where('carts.user_id', $user->id);
                    $query->with(['products' => function ($products) {
                        $products->get();
                    }]);
                }])
                ->whereHas('carts.products', function ($query) {
                    $query->whereNull('products.deleted_at');
                })
                ->count();

              

        
        $countProdcts = count($products);
        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();

        $delivery_fees = Governorate::where('id',$addresses->governorate_id)->first();
       

        return view('site.sale.cart', compact('products', 'countProdcts', 'addresses','delivery_fees','vendors_cart_count'));
    } //cart page

    public function countCart()
    {
        $user = Auth::user();
        $productsCount = Product::whereExists(function ($query) use ($user) {
                $query->select(DB::raw(1))
                      ->from('carts as c')
                      ->whereRaw('products.id = c.product_id')
                      ->where('c.user_id', $user->id);
            })
            ->with('vendor')
            ->count();
        return response()->json(['count' => $productsCount]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'product_id' => ['required', 'exists:products,id'],
            'quantity' => ['int', 'min:1'],
        ]);

        $cart = Cart::where([
            'product_id' => $request->post('product_id'),
        ])->first();

        if ($cart) {
            Cart::where([
                'product_id' => $request->post('product_id'),
            ])->update([
                'quantity' => $cart->quantity +  $request->post('quantity', 1),
            ]);
        } else {
            $cart = Cart::create([
                'product_id' => $request->post('product_id'),
                'quantity' => $request->post('quantity', 1),
                'user_id' => Auth::id(),
            ]);
        }
        Toastr()->success('تم اضافة المنتج لسلة المشتريات بنجاح');
        return redirect()->back();
    } //store items in db to cart


    public function update_cart(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_quantity = $request->input('quantity');

        if (Auth::check()) {
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $product_quantity;
                $cart->update();
                return response()->json(['success' => 'updated']);
            }
        }
    }

    public function destroy($id)
    {
        $product = Cart::with('products')->where('product_id', $id)->first();
        $product->delete();

        Toastr()->success('تم حذف المنتج من سلة المشتريات بنجاح');
        return redirect()->route('cart.index');
    }

    public function checkout(Request $request)
    {
        
        $products = Cart::with('products')->where('user_id', Auth::user()->id)->get();
        if (!$products) {
            return redirect()->route('cart.index');
        }
         
        if( strlen($request->pickedSize[0]) < count($products) || strlen($request->pickedColor[0]) < count($products)  ){

            return back()->with("message" , "يجب اختيار اللون و المقاس لكل المنتجات في السلة لاتمام الطلب");
        }
        
        $Pickedcolors = explode(',' , $request->pickedColor[0]);
        $pickedSizes = explode(',' , $request->pickedSize[0]);

        DB::beginTransaction();
        try {

            $order = Order::Create([
                'user_id'   => Auth::user()->id,
                'status' => 'تم استلام الطلبيه والعمل عليها',
                'total' =>  $request->total,
            ]);
            
            for($i = 0 ; $i < count($products) ; $i++){
               $order_products = $order->items()->create([
                    'order_id'   => $order->id,
                    'product_id' => $products[$i]->product_id,
                    'quantity'   => $products[$i]->quantity,
                    'price'      => $products[$i]->products->price,
                    "product_color" => $Pickedcolors[$i],
                    "product_size" => $pickedSizes[$i],
                    
                ]);
                
            }
            // foreach ($products as $item) {

            //     $order->items()->create([
            //         'order_id'   => $order->id,
            //         'product_id' => $item->product_id,
            //         'quantity'   => $item->quantity,
            //         'price'      => $item->products->price,
            //         "product_color" => $request->pickedColor,
            //         "product_size" => $request->pickedSize,

            //     ]);
            // } //end of foreach

            // Cart::with('products')->where('user_id', Auth::user()->id)->delete();
            DB::commit();
            return redirect()->route('cart.orders', compact('order'));
        } catch (Throwable $e) {
            DB::rollBack();
             return redirect()->back()->with('error', $e->getMessage());

           // return $e->getMessage();
        }
    } //end of checkout اتمام الشراء

    public function orders(Request $request, Order $order)
    {
        $user = Auth::user();

        // $products = Vendor::with(['carts' => function ($query) use ($user) {
        //     $query->where('carts.user_id', $user->id);
        //     $query->with(['products' => function ($products) {
        //         $products->get();
        //     }]);
        // }])->get();
        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])
        ->whereHas('carts.products', function ($query) {
            $query->whereNull('products.deleted_at');
        })
        ->get();

        $countProdcts = count($products);
        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();


        $order = Order::where('user_id', Auth::id())->first();

        return view('site.sale.orders', compact('products', 'countProdcts', 'addresses', 'order'));
    }


    public function updateOrder(Request $request, Order $order)
    {

        $user = Auth::user();

        $this->validate($request, [

            'note' => 'nullable|string|max:255',
        ]);
        $order = Order::where(['user_id' => Auth::id(), 'id' => $request->order_id])->first();
        if (!is_null($request->note)) {
            $order->update([
                'note'  => $request->note,
            ]);
        }
        // $products = Vendor::with(['carts' => function ($query) use ($user) {
        //     $query->where('carts.user_id', $user->id);
        //     $query->with(['products' => function ($products) {
        //         $products->get();
        //     }]);
        // }])->get();
        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])
        ->whereHas('carts.products', function ($query) {
            $query->whereNull('products.deleted_at');
        })
        ->get();
        $countProdcts = count($products);
        

        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();

        return view('site.sale.order_status', compact('user', 'products', 'addresses', 'countProdcts', 'order'));
    }

    public function showOrder($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        $user = Auth::user();

        // $products = Vendor::with(['carts' => function ($query) use ($user) {
        //     $query->where('carts.user_id', $user->id);
        //     $query->with(['products' => function ($products) {
        //         $products->get();
        //     }]);
        // }])->get();
        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])
        ->whereHas('carts.products', function ($query) {
            $query->whereNull('products.deleted_at');
        })
        ->get();

       
        $countProdcts = count($products);

        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();
        return view('site.sale.order_status', compact('user', 'products', 'addresses', 'countProdcts', 'order'));
    }

    public function reviewstore(Request $request )
    {
    
        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->vendor_id = $request->vendor_id;
        $review->comments = $request->input("comments");
        $review->star_rating = $request->star_rating;
         
        $review->save();

        return redirect()->back();

    }

    
}
