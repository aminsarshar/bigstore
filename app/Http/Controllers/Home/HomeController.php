<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGuaranty;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::query()->where('parent_id', 0)->get();
        $product_category = Category::query()->where('parent_id', 0)->take(5)->get();
        $most_sold = Product::query()->orderBy('sold', 'DESC')->get();
        $special_products = ProductGuaranty::query()->where('special_start', '<=', now())->where('special_expiration', '>=', now())->get();
        $products = ProductGuaranty::query()->get();
        $carts = Cart::query()->get();
        return view('front.index', compact('categories', 'most_sold', 'product_category', 'special_products' , 'products' , 'carts'));
    }

    public function singleProduct($slug)
    {
        $products = Product::query()->with(['category', 'brand', 'colors', 'tags', 'properties', 'propertyGroups', 'galleries', 'guaranty'])->where('slug', $slug)->first();
        $categories = Category::query()->where('parent_id', 0)->get();
        $carts = Cart::query()->get();
        return view('front.products.show', compact('categories', 'products' , 'carts'));
    }

}
