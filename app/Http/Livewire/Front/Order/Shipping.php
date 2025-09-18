<?php

namespace App\Http\Livewire\Front\Order;

use App\Models\Cart;
use Livewire\Component;
use App\Models\ProductGuaranty;

class Shipping extends Component
{
    protected $listeners = [
        'refreshCart' => '$refresh',
    ];
    public function render()
    {
        $userId = auth()->id();
        $carts = Cart::query()->where('type', 'main')->where('user_id', $userId)->get();
        $total_price = 0;
        $discount_price = 0;

        foreach ($carts as $cart) {
            $product = ProductGuaranty::query()->where([
                'product_id' => $cart->product_id,
                'color_id' => $cart->color_id,
                'guaranty_id' => $cart->guaranty_id,
            ])->first();

            $total_price += ($product->price) * $cart->count;
            $discount_price += ($product->main_price - $product->price) * $cart->count;
        }
        return view('livewire.front.order.shipping' , compact('carts' , 'total_price' , 'discount_price'));
    }
}
