<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Brand;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Product;

class CateController extends Controller
{
    public function show($slug)
    {
        $category = Category::where('slug', $slug)->firstOrFail();
        $carts = Cart::query()->get();
$categoryIds = [$category->id];

foreach ($category->childCategory as $child) {

    $categoryIds[] = $child->id;

    foreach ($child->childCategory as $child2) {

        $categoryIds[] = $child2->id;

    }
}

$products = Product::with([
        'brand',
        'productGuaranties.color',
        'productGuaranties.guaranty',
    ])
    ->whereIn('category_id', $categoryIds)
    ->latest()
    ->paginate(12);

        $categories = Category::with('Categorychild')
            ->where('parent_id', 0)
            ->get();

        $brands = Brand::all();

        $colors = Color::all();

        $guaranties = Guaranty::all();

        return view('front.category.products', compact(
            'category',
            'products',
            'categories',
            'brands',
            'colors',
            'guaranties',
            'carts'
        ));
    }
}
