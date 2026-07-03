<?php

namespace App\Http\Livewire\Front;

use Livewire\Component;
use App\Models\Cart;
use App\Models\ProductGuaranty;

class AddToCartButton extends Component
{
    public $product;

    public function addToCart()
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $productGuaranty = ProductGuaranty::where('product_id', $this->product->id)
            ->orderBy('price')
            ->first();

        if (!$productGuaranty) {

            toastr()->error('این محصول قابل سفارش نیست.');

            return;
        }

        $cart = Cart::where([
            'user_id' => auth()->id(),
            'product_id' => $this->product->id,
            'color_id' => $productGuaranty->color_id,
            'guaranty_id' => $productGuaranty->guaranty_id,
        ])->first();

        if ($cart) {

            $cart->increment('count');

        } else {

            Cart::create([
                'user_id'      => auth()->id(),
                'product_id'   => $this->product->id,
                'color_id'     => $productGuaranty->color_id,
                'guaranty_id'  => $productGuaranty->guaranty_id,
                'count'        => 1,
                'type'         => 'main',
            ]);
        }

        $this->dispatchBrowserEvent('cart-added');

        toastr()->success('محصول به سبد خرید اضافه شد.');
    }

    public function render()
    {
        return view('livewire.front.add-to-cart-button');
    }
}
