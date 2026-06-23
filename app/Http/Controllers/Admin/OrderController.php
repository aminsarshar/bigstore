<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = Order::with('items.product')
            ->latest()
            ->paginate(10);

        return view('admin.orders.index', compact('orders'));
    }

    public function create()
    {

        $products = Product::all();

        return view('admin.orders.create', compact('products'));
    }

    public function store(Request $request)
    {
        $order = Order::create([
            'customer_name' => $request->customer_name,
            'customer_phone' => $request->customer_phone,
            'total_price' => 0
        ]);

        $total = 0;

        foreach ($request->products as $item) {
            $product = Product::find($item['id']);

            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $product->id,
                'quantity' => $item['quantity'],
                'price' => $product->price
            ]);

            $total += $product->price * $item['quantity'];
        }

        $order->update([
            'total_price' => $total
        ]);

        return redirect()->route('orders.invoice', $order->id);
    }

    public function invoice($id)
    {
        $order = Order::with('items.product')->findOrFail($id);

        return view('admin.orders.invoice', compact('order'));
    }

    public function destroy(Order $order)
    {
        $order->delete();

        return redirect()
            ->route('orders.index')
            ->with('success', 'سفارش با موفقیت حذف شد');
    }
}
