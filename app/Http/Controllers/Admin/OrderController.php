<?php

namespace App\Http\Controllers\Admin;

use App\Events\OrderStatusUpdated;
use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Event;


class OrderController extends Controller
{
    public function index()
    {
        // $orders = Order::with(['items', 'user'])->get();

        $orders = Order::with(['items', 'user.addresses.governorate'])->get();
        return view('admin.orders.index', compact('orders'));
    }

    public function edit($id)
    {
        $orders = Order::with(['items', 'user.addresses.governorate'])->get();
        $order = Order::with(['items', 'user.addresses.governorate'])->findOrFail($id);
        return view('admin.orders.edit', compact('order', 'orders'));
    }

    public function update(Request $request, $id)
    {

        $order = Order::with(['items', 'user'])->findOrFail($id);
        $previousStatus = $order->status;
        $order->update($request->only('status'));

        // Fire the event if the status has changed
        if ($order->status !== $previousStatus) {
            Event::dispatch(new OrderStatusUpdated($order, $order->status));
        }

        return redirect()->route('order.index');
    }

    public function destroy($id)
    {
        $order = Order::findOrFail($id);
        $order->delete();

        return redirect()->route('order.index');
    }
}
