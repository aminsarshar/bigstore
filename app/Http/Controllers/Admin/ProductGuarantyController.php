<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\DateManager;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ProductGuarnties\ProductGuarantyRequest;
use App\Models\Color;
use App\Models\Guaranty;
use App\Models\Product;
use App\Models\ProductGuaranty;
use Illuminate\Http\Request;

class ProductGuarantyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($product_id)
    {
        $product = Product::findOrFail($product_id);
        return view('admin.product_guaranty.index', compact('product_id', 'product'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create($id)
    {
        $guaranties = Guaranty::query()->pluck('name', 'id');
        $colors = Color::query()->pluck('name', 'id');
        $product = Product::query()->find($id);
        return view('admin.product_guaranty.create', compact('guaranties', 'product', 'colors'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ProductGuarantyRequest $request, $id)
    {
        $product = Product::query()->find($id);

        $product_id = $product->id;
        $less_price = ProductGuaranty::query()->orderBy('price', "ASC")->where('product_id', $product_id)->first();
        $price = ($request->main_price) - (($request->main_price * $request->discount) / 100);
        $product = Product::query();
        $product = ProductGuaranty::query()->create([
            'main_price' => $request->main_price,
            'price' => $price,
            'discount' => $request->discount,
            'count' => $request->count,
            'max_sell' => $request->max_sell,
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'guaranty_id' => $request->guaranty_id,
            'special_start' => $request->special_start != null ? DateManager::shamsi_to_miladi($request->special_start) : null,
            'special_expiration' => $request->special_expiration != null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

        ]);

        if ($less_price) {
            $product = Product::query()->find($request->product_id);
            if ($price < $less_price->price) {
                $product->update([
                    'price' => $price,
                    'discount' => $request->discount,
                    'count' => $request->count,
                    'max_sell' => $request->max_sell,
                    'guaranty_id' => $request->guaranty_id,
                    'special_start' => $request->special_start != null ? DateManager::shamsi_to_miladi($request->special_start) : null,
                    'special_expiration' => $request->special_expiration != null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

                ]);

                // $colors = [];
                $product_guaranties = ProductGuaranty::query()
                    ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
                foreach ($product_guaranties as $product_guaranty) {
                    // array_push($colors, $product_guaranty->color_id);
                    if ($product->colors()->where('color_id', $product_guaranty->color_id)->exists()) {
                        $product->colors()->sync($product_guaranty->color_id);
                    } else {
                        $product->colors()->attach($product_guaranty->color_id);

                    }
                }

            } else {
                if ($product->guaranty_id == $request->guaranty_id) {
                    // $colors = [];
                    $product_guaranties = ProductGuaranty::query()
                        ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
                    foreach ($product_guaranties as $product_guaranty) {
                        // array_push($colors, $product_guaranty->color_id);
                        if ($product->colors()->where('color_id', $product_guaranty->color_id)->exists()) {
                            $product->colors()->sync($product_guaranty->color_id);
                        } else {
                            $product->colors()->attach($product_guaranty->color_id);

                        }
                    }
                }
            }

        } else {
            $product = Product::query()->find($request->product_id);
            $product->update([
                'price' => $price,
                'discount' => $request->discount,
                'count' => $request->count,
                'max_sell' => $request->max_sell,
                'guaranty_id' => $request->guaranty_id,
                'special_start' => $request->special_start != null ? DateManager::shamsi_to_miladi($request->special_start) : null,
                'special_expiration' => $request->special_expiration != null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

            ]);

            $product->colors()->sync($request->color);

            // $colors = [];
            $product_guaranties = ProductGuaranty::query()
                ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
            foreach ($product_guaranties as $product_guaranty) {
                // array_push($colors, $product_guaranty->color_id);
                if ($product->colors()->where('color_id', $product_guaranty->color_id)->exists()) {
                    $product->colors()->sync($product_guaranty->color_id);
                } else {
                    $product->colors()->attach($product_guaranty->color_id);

                }

            }
        }

        toastr()->success(' تنوع قیمت محصول با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000, 'positionClass' => 'toast-top-center']);
        return redirect(route('products.index'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id, $product_id)
    {
        $product = Product::query()->find($product_id);
        // $product_id = $product->id;
        $guaranties = Guaranty::query()->pluck('name', 'id');
        $product_guaranty = ProductGuaranty::findOrFail($id);
        $colors = Color::query()->pluck('name', 'id');

        // $product = Product::findOrFail($id);
        return view('admin.product_guaranty.edit', compact('product', 'guaranties', 'product_guaranty', 'colors'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id, $product_id)
    {
        $product = Product::query()->find($product_id);

        $product_id = $product->id;
        $less_price = ProductGuaranty::query()->orderBy('price', "ASC")->where('product_id', $product_id)->first();
        $price = ($request->main_price) - (($request->main_price * $request->discount) / 100);
        $product = Product::query();
        $product_guaranty = ProductGuaranty::query()->find($id);
        $product_guaranty->update([
            'main_price' => $request->main_price,
            'price' => $price,
            'discount' => $request->discount,
            'count' => $request->count,
            'max_sell' => $request->max_sell,
            'product_id' => $request->product_id,
            'color_id' => $request->color_id,
            'guaranty_id' => $request->guaranty_id,
            'special_start' => DateManager::shamsi_to_miladi($request->special_start),
            'special_expiration' => $request->special_expiration != null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

        ]);

        // if ($less_price) {
        $product = Product::query()->find($request->product_id);
        if ($price <= $less_price->price) {
            $product->update([
                'price' => $price,
                'discount' => $request->discount,
                'count' => $request->count,
                'max_sell' => $request->max_sell,
                'guaranty_id' => $request->guaranty_id,
                'special_start'=> DateManager::shamsi_to_miladi($request->special_start),
                'special_expiration' => $request->special_expiration != null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

            ]);

            // $colors = [];
            $product_guaranties = ProductGuaranty::query()
                ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
            foreach ($product_guaranties as $product_guaranty) {
                // array_push($colors, $product_guaranty->color_id);
                if ($product->colors()->where('color_id', $product_guaranty->color_id)->exists()) {
                    $product->colors()->sync($product_guaranty->color_id);
                } else {
                    $product->colors()->attach($product_guaranty->color_id);

                }

            }

        } else {
            if ($product->guaranty_id == $request->guaranty_id) {
                // $colors = [];
                $product_guaranties = ProductGuaranty::query()
                    ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
                foreach ($product_guaranties as $product_guaranty) {
                    // array_push($colors, $product_guaranty->color_id);
                    if ($product->colors()->where('color_id', $product_guaranty->color_id)->exists()) {
                        $product->colors()->sync($product_guaranty->color_id);
                    } else {
                        $product->colors()->attach($product_guaranty->color_id);

                    }
                }
            }
        }

        // } else {
        //     $product = Product::query()->find($request->product_id);
        //     $product->update([
        //         'price' => $price,
        //         'discount' => $request->discount,
        //         'count' => $request->count,
        //         'max_sell' => $request->max_sell,
        //         'guaranty_id' => $request->guaranty_id,
        //         'special_start' =>$request->special_start !=null ? DateManager::shamsi_to_miladi($request->special_start) : null,
        //         'special_expiration' =>$request->special_expiration !=null ? DateManager::shamsi_to_miladi($request->special_expiration) : null,

        //     ]);

        //     $product->colors()->sync($request->color);
        //     $colors = [];
        //     $product_guaranties = ProductGuaranty::query()
        //         ->where('product_id', $product_id)->where('guaranty_id', $request->input('guaranty_id'))->get();
        //     foreach ($product_guaranties as $product_guaranty) {
        //         array_push($colors, $product_guaranty->color_id);

        //     }

        //     $product->colors()->sync($colors);
        // }

        toastr()->success(' تنوع قیمت محصول با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000, 'positionClass' => 'toast-top-center']);
        return redirect(route('products.index'));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //

    }

}
