<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductGuaranty;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {

        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();



        $product_category = Category::query()->where('parent_id', 0)->take(5)->get();
        $most_sold = Product::query()->where('discount', '=', 0)->get();
        $special_products = ProductGuaranty::query()->where('special_start', '<=', now())->where('special_expiration', '>=', now())->where('discount', '!=', 0)->get();
        $products = ProductGuaranty::query()->get();
        $carts = Cart::query()->get();
        return view('front.index', compact('categories', 'most_sold', 'product_category', 'special_products', 'products', 'carts'));
    }

    public function singleProduct($slug)
    {
        $products = Product::query()->with(['category', 'brand', 'colors', 'tags', 'properties', 'propertyGroups', 'galleries', 'guaranty'])->where('slug', $slug)->first();
        $categories = Category::query()->where('parent_id', 0)->get();
        $carts = Cart::query()->get();
        return view('front.products.show', compact('categories', 'products', 'carts'));
    }

    public function aboutUs()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();
        $carts = Cart::query()->get();

        return view('front.about-us', compact('categories', 'carts'));
    }

    public function contactUs()
    {
        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();
        $carts = Cart::query()->get();

        return view('front.contact-us', compact('categories', 'carts'));
    }

    public function blogs()
    {

        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();
        $carts = Cart::query()->get();
        return view('front.blogs.index', compact(
            'categories',
            'carts',
        ));
    }


    public function shop()
    {

        $categories = Category::query()
            ->with('Categorychild')
            ->where('parent_id', 0)
            ->get();
        $carts = Cart::query()->get();
        $products = Product::query()->latest()->get();
        return view('front.shop', compact(
            'categories',
            'carts',
            'products',
        ));
    }
}
