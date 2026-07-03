<?php

namespace App\Http\Livewire\Front\Products;

use App\Models\Cart;
use App\Models\ProductGuaranty;
use Livewire\Component;

class SingleProduct extends Component
{

    public $products;
    public $product_guaranty;

    public function mount()
    {
        $this->product_guaranty = ProductGuaranty::query()->where('product_id', $this->products->id)->orderBy('price', 'ASC')->first();
    }

    public function ChangeProduct($color_id)
    {
        $this->product_guaranty = ProductGuaranty::query()->where('product_id', $this->products->id)->where('color_id', $color_id)->orderBy('price', 'ASC')->first();
    }

    public $count = 1;

    public function increment()
    {
        $this->count++;
    }

    public function decrement()
    {
        if ($this->count > 1) {
            $this->count--;
        }
    }

    public function addToCart($color_id, $guaranty_id)
    {

        if (!auth()->check()) {
            return redirect()->route('login');
        }

        $cart = Cart::where('user_id', auth()->id())
            ->where('product_id', $this->products->id)
            ->where('color_id', $color_id)
            ->where('guaranty_id', $guaranty_id)
            ->first();

        if ($cart) {

            $cart->increment('count', $this->count);
        } else {

            Cart::create([
                'user_id'      => auth()->id(),
                'product_id'   => $this->products->id,
                'color_id'     => $color_id,
                'guaranty_id'  => $guaranty_id,
                'count'        => $this->count,
            ]);
        }
        toastr()->success('محصول با موفقیت به سبد خرید اضافه شد!');

       $this->emit('refreshCartHeader');
        // return redirect()->route('cart');
    }



    public function render()
    {
        return view('livewire.front.products.single-product');
    }
}
