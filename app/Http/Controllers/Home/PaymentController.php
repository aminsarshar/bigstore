<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\ProductGuaranty;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Shetabit\Multipay\Invoice;
use Shetabit\Payment\Facade\Payment;

class PaymentController extends Controller
{
    public function payment()
    {

        // dd('ok');

        $userId = auth()->user()->id;
        $user = auth()->user();
        $address = Address::query()->where('user_id', $userId)->first();
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
        $order = Order::query()->create([
            'user_id' => $userId,
            'order_code' => rand(11111, 99999),
            'address_id' => $address->id,
            'total_price' => $total_price,


        ]);


        foreach ($carts as $cart) {
            OrderItem::query()->create([
                'order_id' => $order->id,
                'product_id' => $cart->product_id,
                'price' => $total_price,
                'quantity' => $cart->count,


            ]);
        }

        return Payment::purchase(
            (new Invoice)->amount($total_price),
            function ($driver, $transactionId) use ($order) {
                $order->update(['transaction_id' => $transactionId]);
            }
        )->pay()->render();
    }



    public function callback(Request $request)
    {
        $authority = $request->Authority;

        $order = Order::where('transaction_id', $authority)->first();

        if (!$order) {
            abort(404);
        }

        $categories = Category::with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::all();

        if ($request->Status != "OK") {

            $result = "failed";

            return view('front.shipping.shipping_result', compact(
                'result',
                'order',
                'categories',
                'carts'
            ));
        }

        DB::beginTransaction();

        try {

            $order->update([
                'status' => 1,
            ]);

            $orderItems = OrderItem::where('order_id', $order->id)->get();

            foreach ($orderItems as $item) {

                $product = ProductGuaranty::where([
                    'product_id'  => $item->product_id,
                    'color_id'    => $item->color_id,
                    'guaranty_id' => $item->guaranty_id,
                ])->first();

                if (!$product) {
                    continue;
                }

                $product->decrement('count', $item->count);
            }

            Cart::where('type', 'main')
                ->where('user_id', $order->user_id)
                ->delete();

            DB::commit();

            $result = "successful";
        } catch (\Exception $e) {

            DB::rollBack();

            report($e);

            $result = "failed";
        }

        return view('front.shipping.shipping_result', compact(
            'result',
            'order',
            'categories',
            'carts'
        ));
    }

    public function success()
    {

        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $carts = Cart::query()->get();

        return view('front.shipping.shipping_result', compact('categories', 'carts'));
    }
}
