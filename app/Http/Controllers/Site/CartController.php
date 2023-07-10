<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\DeliveryPrice;
use App\Models\Order;
use App\Models\OrderProduct;
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

        ///////////////////////////////////////////////////

        $cart_products = Vendor::with(['carts' => function ($query) use ($user) {
            if ($user) {
                $query->where('user_id', $user->id);
            }
            $query->orWhere('uuid', $this->getCartId());
            $query->with(['products' => function ($products) {
                $products->whereNull('products.deleted_at');
            }]);
        }])->whereHas('carts.products', function ($query) {
            $query->whereNull('products.deleted_at');
        })->get();

        $vendors_cart_count = Vendor::with(['carts' => function ($query) use ($user) {
            if ($user) {
                $query->where('user_id', $user->id);
            }
            $query->orWhere('uuid', $this->getCartId());
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])
            ->whereHas('carts.products', function ($query) {
                $query->whereNull('products.deleted_at');
            })
            ->count();

        $countProdcts = count($cart_products);

        if($user){

            $user_address = Address::with('governorate')->where('user_id', $user->id)->where('is_default', true)->first();
        }

        // if ($user_address == null || $user_address->governorate_id == null) {
        //     session()->flash('error', 'برجاء اكمال بياناتك الشخصيه واضافة عنوان خاص بك');
        //     return redirect()->back();
        // }

        if($user){

            return view('site.sale.cart', compact('cart_products', 'countProdcts', 'user_address', 'vendors_cart_count'));
        }

        return view('site.sale.cart', compact('cart_products', 'countProdcts', 'vendors_cart_count'));
    } //cart page

    public function store(Request $request)
    {

        $uuid = $this->getCartId();
        $user_id = auth()->check() ? auth()->user()->id : null;
        $size = $request->size;
        $price = $request->price;
        $selectedColor = $request->color;

        if (!$uuid) {
            $uuid = Str::uuid()->toString();
            $cart = Cart::create([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
                'user_id' => $user_id,
                'quantity' => $request->quantity ?? 1,
            ]);

            return response()->json('added')->cookie('cart_uuid', $uuid, 60 * 24 * 7);
        } else {
            $cart = Cart::updateOrCreate([
                'uuid' => $uuid,
                'product_id' => $request->product_id,
                'quantity' => $request->quantity ?? 1,

            ], [
                'user_id' => $user_id,
                'size' => $size, // Update the selected size
                'price' => $price, // Update the selected price
                'color' => $selectedColor,
            ]);

            if ($cart->wasRecentlyCreated) {
                return response()->json('added')->cookie('cart_uuid', $uuid, 60 * 24 * 7);
            } else {
                return response()->json('exists');
            }
        }

    } //store items in db to cart

    public function update_cart(Request $request)
    {

        $product_id = $request->input('product_id');
        $product_quantity = $request->input('quantity');

        if (Auth::check()) {
            if (Cart::where('product_id', $product_id)->where('user_id', Auth::id())->exists()) {
                $cart = Cart::where('product_id', $product_id)->where('user_id', Auth::id())->first();
                $cart->quantity = $product_quantity;
                $cart->save(); // Use save() instead of update()
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

        $cart_products = Cart::with('products')->where('user_id', Auth::user()->id)->get();

        if (!$cart_products) {
            return redirect()->route('cart.index');
        }

        DB::beginTransaction();
        try {

            $existingOrder = Order::where('user_id', Auth::user()->id)
                ->where('status', 'تم استلام الطلبيه والعمل عليها')
                ->first();

            if ($existingOrder) {
                // Compare the existing cart items with the products being checked out
                $matchingItems = $existingOrder->items()->whereIn('product_id', $cart_products->pluck('product_id'))
                    ->get();

                if ($matchingItems->count() === count($cart_products)) {
                    // All cart items match existing order items, so delete the existing order and its items
                    $existingOrder->items()->delete();
                    $existingOrder->delete();
                }
            }
            $deliveryFees = $request->input('deliveryFee');

            $order = Order::Create([
                'user_id' => Auth::user()->id,
                'status' => 'تم استلام الطلبيه والعمل عليها',
                'total' => $request->total,
            ]);

            foreach ($cart_products as $index => $item) {
                $orderItem = $order->items()->create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->price ?? $item->products->new_price ?? $item->products->old_price,
                    'deliveryPrice' => $deliveryFees[$index] ?? null,
                    'product_color' => $item->color,
                    'product_size' => $item->size,
                ]);
            }

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

        $cart_products = Vendor::with(['carts' => function ($query) use ($user) {
            if ($user) {
                $query->where('user_id', $user->id);
            }
            $query->orWhere('uuid', $this->getCartId());
            $query->with(['products' => function ($products) {
                $products->whereNull('products.deleted_at');
            }]);
        }])->whereHas('carts.products', function ($query) {
            $query->whereNull('products.deleted_at');
        })->get();

        $vendors_cart_count = Vendor::with(['carts' => function ($query) use ($user) {
            if ($user) {
                $query->where('user_id', $user->id);
            }
            $query->orWhere('uuid', $this->getCartId());
            $query->with(['products' => function ($products) {
                $products->get();
            }]);
        }])
            ->whereHas('carts.products', function ($query) {
                $query->whereNull('products.deleted_at');
            })
            ->count();
        $countProdcts = count($cart_products);

        $order = Order::where('user_id', Auth::id())->first();

        $user_address = Address::with('governorate')->where('user_id', auth()->user()->id)->where('is_default', true)->first();

        // Loop through each vendor
        foreach ($cart_products as $vendor) {
            // Get the vendor's ID
            $vendorId = $vendor->id;

            // Query the delivery_prices table to retrieve the price based on the user's governorate ID and the vendor's ID
            $deliveryPrice = DeliveryPrice::where('governorate_id', $user_address->governorate_id)
                ->where('vendor_id', $vendorId)
                ->select('price')->first();

            $deliveryFee = $deliveryPrice ? $deliveryPrice->price : 0;

        }

        return view('site.sale.orders', compact(
            'user',
            'cart_products',
            'vendors_cart_count',
            'countProdcts',
            'order',
            'user_address',
            'vendorId',
            'deliveryPrice',
            'deliveryFee'
        )
        );
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
                'note' => $request->note,
            ]);
        }
        Cart::where('user_id', Auth::user()->id)->delete();

        return redirect()->route('order.show', ['id' => $order->id]);

    }

    public function showOrder($id)
    {
        $order = Order::with(['items.product.vendor'])->where('user_id', Auth::id())
            ->findOrFail($id);

        $vendors = $order->items->groupBy('product.vendor_id')->map(function ($items) {
            $vendor = $items->first()->product->vendor;
            $orderProducts = $items->map(function ($item) {
                $orderProduct = OrderProduct::find($item->id);

                return [
                    'id' => $orderProduct->id,
                    'order_id' => $orderProduct->order_id,
                    'product_id' => $orderProduct->product_id,
                    'quantity' => $orderProduct->quantity,
                    'price' => $orderProduct->price,
                    'color' => $orderProduct->product_color,
                    'size' => $orderProduct->product_size,
                    'deliveryPrice' => $orderProduct->deliveryPrice,
                    'created_at' => $orderProduct->created_at,
                    'updated_at' => $orderProduct->updated_at,
                    'product' => $item->product,
                ];
            });

            return [
                'id' => $vendor->id,
                'vendor_name' => $vendor->vendor_name,
                'vendor_price' => $vendor->vendor_price,
                'exchange_status' => $vendor->exchange_status,
                'delivery_status' => $vendor->delivery_status,
                'created_at' => $vendor->created_at,
                'updated_at' => $vendor->updated_at,
                'order_products' => $orderProducts,
            ];
        });

        $cart_products = $vendors->values();

        // return $cart_products ;

        $countProdcts = $vendors->values()->count();

        return view('site.sale.order_status', compact('cart_products', 'countProdcts', 'order'));
    }

    public function reviewstore(Request $request)
    {

        $request->validate([
            'comments' => 'required', 'max:255',
        ]);

        $review = new Review();
        $review->user_id = auth()->user()->id;
        $review->product_id = $request->product_id;
        $review->vendor_id = $request->vendor_id;
        $review->comments = $request->input("comments");
        $review->star_rating = $request->star_rating;

        $review->save();

        return response()->json('success');

    }

    protected function getCartId()
    {
        $id = request()->cookie('cart_uuid');
        if (!$id) {
            $id = Str::uuid();
            Cookie::queue('cart_id', $id, 60 * 24 * 7);
        }

        return $id;
    }

}
