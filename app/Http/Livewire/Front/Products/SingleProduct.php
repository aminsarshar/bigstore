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

    public function addToCart($color_id, $guaranty_id)
    {
        if (auth()->user()) {
            $cart = Cart::query()
                ->where('user_id', auth()->user()->id)
                ->where('product_id', $this->products->id)
                ->where('color_id', $color_id)
                ->where('guaranty_id', $guaranty_id)
                ->first();
            if ($cart) {
                $cart->update([
                    'count' => $cart->count + 1,
                ]);
            } else {
                Cart::query()->create([
                    'user_id' => auth()->user()->id,
                    'product_id' => $this->products->id,
                    'color_id' => $color_id,
                    'guaranty_id' => $guaranty_id,
                    'count' => 1,
                ]);


            }
        } else {
            return redirect()->route('login');
        }

        toastr()->success('محصول با موفقیت به سبد خرید اضافه شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);

        return redirect()->route('cart');
    }

    public function render()
    {
        return view('livewire.front.products.single-product');
    }
}
