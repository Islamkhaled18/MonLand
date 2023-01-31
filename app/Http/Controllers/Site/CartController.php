<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
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
use Throwable;
use Yoeunes\Toastr\Facades\Toastr;

class CartController extends Controller
{
    public function index(Request $request)
    {

        $user = Auth::user();

        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])->get();

        
        $countProdcts = count($products);
        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();

        return view('site.sale.cart', compact('products', 'countProdcts', 'addresses'));
    } //cart page

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
    } //store items in db


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
        DB::beginTransaction();
        try {

            $order = Order::Create([
                'user_id'   => Auth::user()->id,
                'status' => 'تم استلام الطلبيه والعمل عليها',
                'total' =>  $request->total,
            ]);
            foreach ($products as $item) {

                $order->items()->create([
                    'order_id'   => $order->id,
                    'product_id' => $item->product_id,
                    'quantity'   => $item->quantity,
                    'price'      => $item->products->price,

                ]);
            } //end of foreach

            // Cart::with('products')->where('user_id', Auth::user()->id)->delete();
            DB::commit();
            return redirect()->route('cart.orders', compact('order'));
        } catch (Throwable $e) {
            DB::rollBack();
            return redirect()->back()->with('error', $e->getMessage());
        }
    } //end of checkout

    public function orders(Request $request, Order $order)
    {
        $user = Auth::user();

        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])->get();

           

        $countProdcts = count($products);
        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();

        // $order = $user->orders;

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
        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])->get();
        $countProdcts = count($products);
        

        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();

        return view('site.sale.order_status', compact('user', 'products', 'addresses', 'countProdcts', 'order'));
    }

    public function showOrder($id)
    {
        $order = Order::where('user_id', Auth::id())->findOrFail($id);
        $user = Auth::user();

        $products = Vendor::with(['carts' => function ($query) use ($user) {
            $query->where('carts.user_id', $user->id);
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])->get();

       
        $countProdcts = count($products);

        $addresses = Address::with('governorate')->where('user_id', auth()->user()->id)->first();
        return view('site.sale.order_status', compact('user', 'products', 'addresses', 'countProdcts', 'order'));
    }

    public function reviewstore(Request $request )
    {
        
    
        $review = new Review();
        $review->product_id = $request->product_id;
        $review->vendor_id = $request->vendor_id;
        $review->comments = $request->input("comments");
        $review->star_rating = $request->star_rating;
         
        
        
        $review->save();

        return redirect()->back();

    }

    
}
