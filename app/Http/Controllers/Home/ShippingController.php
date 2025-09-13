<?php

namespace App\Http\Controllers\Home;

use App\Models\Cart;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ShippingController extends Controller
{
    public function shipping(){
        $userId = auth()->id();
        $categories = Category::query()->where('parent_id', 0)->get();
        $carts = Cart::query()->where('type' , 'main')->where('user_id', $userId)->get();
        return view('front.shipping.shipping' , compact('categories' , 'carts'));
    }
}
