<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();
        return view('front.profile.index', compact('categories', 'carts'));
    }

    public function orders()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();
        $orders = Order::where('user_id', auth()->id())
            ->latest()
            ->paginate(10);

        return view('front.profile.orders', compact('orders', 'categories', 'carts'));
    }

    public function showOrder(Order $order)
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();
        abort_if($order->user_id != auth()->id(), 403);

        return view('front.profile.order.show', compact('order', 'categories', 'carts'));
    }

    public function addresses()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();
        $addresses = auth()->user()
            ->addresses()
            ->latest()
            ->get();

        return view('front.profile.addresses', compact('addresses', 'categories', 'carts'));
    }

    public function edit()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();
        $addresses = auth()->user()
            ->addresses()
            ->latest()
            ->get();
        return view('front.profile.edit' , compact('categories', 'carts'));
    }
}