<?php

namespace App\Http\Livewire\Front\Carts;

use App\Models\Cart;
use App\Models\Product;
use Livewire\Component;
use App\Models\ProductGuaranty;

class CartDetail extends Component
{
    // public $carts;

    protected $listeners = [
        'refreshCart' => '$refresh',
    ];

    public function increaseCart($product_id, $color_id, $guaranty_id)
    {

        $cart = Cart::query()
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->where('guaranty_id', $guaranty_id)
            ->first();
        if ($cart) {
            $cart->update([
                'count' => $cart->count + 1,
            ]);
        }
        $this->emit('refreshCart');
        toastr()->success('تعداد محصول با موفقیت افزایش یافت!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);

    }

    public function decreaseCart($product_id, $color_id, $guaranty_id)
    {
        $cart = Cart::query()
            ->where('user_id', auth()->user()->id)
            ->where('product_id', $product_id)
            ->where('color_id', $color_id)
            ->where('guaranty_id', $guaranty_id)
            ->first();
        if ($cart && $cart->count > 0) {
            $cart->update([

                'count' => $cart->count - 1,
            ]);
        } else {
            Cart::query()
                ->where('user_id', auth()->user()->id)
                ->where('product_id', $product_id)
                ->where('color_id', $color_id)
                ->where('guaranty_id', $guaranty_id)
                ->delete();
        }
        $this->emit('refreshCart');
        toastr()->success('تعداد محصول با موفقیت کاهش یافت!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
    }

    public function moveToReserveCart($cart_id)
    {

        $cart = Cart::query()->find($cart_id);
        $cart->update([
            'type' => 'reserve'

        ]);

        $this->emit('refreshCart');
        toastr()->success('محصول به سبد خرید بعدی منتقل شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
    }

    public function moveToMainCart($cart_id)
    {

        $cart = Cart::query()->find($cart_id);
        $cart->update([
            'type' => 'main'

        ]);

        $this->emit('refreshCart');
        toastr()->success('محصول به سبد خرید منتقل شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
    }

    public function moveAllToMainCart()
    {

        $carts = Cart::query()->where('type', 'reserve')->where('user_id', auth()->user()->id)->get();
        foreach ($carts as $cart) {
            $cart->update([
                'type' => 'main'
            ]);
        }

        $this->emit('refreshCart');
        toastr()->success('همه محصولات به سبد خرید منتقل شدند!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
    }

    public function deleteCart($cart_id)
    {

        $cart = Cart::query()->find($cart_id);
        $cart->delete();

        $this->emit('refreshCart');
        toastr()->success(' محصول مورد نظر از سبد خرید حذف شد  !', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
    }



    public function render()
    {
        $userId = auth()->id();
        $carts = Cart::query()->where('type', 'main')->where('user_id', $userId)->get();
        $reserved_carts = Cart::query()->where('type', 'reserve')->get();
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
        return view('livewire.front.carts.cart-detail', compact('carts', 'reserved_carts', 'total_price', 'discount_price'));
    }
}
