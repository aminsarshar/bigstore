<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Str;
use App\Models\ImageGallery;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('admin.products.index');


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $products = Product::query();
        $categories = Category::query()->pluck('name' , 'id');
        $tags = Tag::query()->pluck('name' , 'id');
        $brands = Brand::query()->pluck('name' , 'id');
        return view('admin.products.create' , compact('products' , 'categories' , 'tags' , 'brands'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $file = $request->file('image');
        $image = '';
        if (!empty($file)) {
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/products', $image);
        }
        $product = Product::query()->create([
            'image' => $image,
            'title' => $request->title,
            'etitle' => $request->etitle,
            'slug' => Str::slug($request->etitle),
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,


        ]);

        $product->tags()->attach($request->tags);

        toastr()->success(' محصول با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000]);
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
    public function edit(string $id)
    {
        // $products = Product::query()->pluck('title', 'id');
        $product = Product::findOrFail($id);
        $categories = Category::query()->pluck('name' , 'id');
        $tags = Tag::query()->pluck('name' , 'id');
        $brands = Brand::query()->pluck('name' , 'id');
        return view('admin.products.edit' , compact('product', 'categories' , 'tags' , 'brands'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $product = Product::findOrFail($id);
        $file = $request->file('image');
        $image = '';

        if (!empty($file)) {
            if (file_exists('admin/images/products/' . $product->image)) {
                unlink('admin/images/products/' . $product->image);
            }
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/products/', $image);
        } else {
            $image = $product->image;
        }

        $product->update([
            'image' => $image,
            'title' => $request->title,
            'etitle' => $request->etitle,
            'slug' => Str::slug($request->etitle),
            'description' => $request->description,
            'brand_id' => $request->brand_id,
            'category_id' => $request->category_id,


        ]);

        $product->tags()->sync($request->tags);

        toastr()->success('محصول با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000 , 'positionClass' => 'toast-top-center']);
        return redirect()->route('products.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function trashed()
    {
        return view('admin.products.trashed_list');
    }


    public function CreateImageGallery(string $id)
    {
        $product = Product::query()->find($id);
        return view('admin.products.imagegallery' , compact('product'));

    }

    public function StoreImageGallery(Request $request , string $id)
    {
        $file = $request->file('image');
        $image = '';
        if (!empty($file)) {
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/ImageGalleries', $image);
        }
        ImageGallery::query()->create([
            'product_id' => $id,
            'image' => $image,
            'position' =>ImageGallery::query()->where('product_id' , $id)->count(),


        ]);

        return redirect()->back();

    }

    public function CreateProductProperties(Product $product)
    {
        return view('admin.products.product_properties' , compact('product'));
    }
}
