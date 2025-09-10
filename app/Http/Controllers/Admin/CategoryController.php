<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('admin.categories.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::query()->pluck('name', 'id');
        return view('admin.categories.create', compact('categories'));

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
            $file->move('admin/images/categories', $image);
        }
        Category::query()->create([
            'image' => $image,
            'name' => $request->name,
            'ename' => $request->ename,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->ename),

        ]);

        toastr()->success('دسته بندی با موفقیت ایجاد شد!', 'موفق', ['timeOut' => 5000]);
        return redirect(route('categories.index'));
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
        $categories = Category::query()->pluck('name', 'id');
        $category = Category::findOrFail($id);
        return view('admin.categories.edit', compact('category', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $category = Category::findOrFail($id);
        $file = $request->file('image');
        $image = '';

        if (!empty($file)) {
            if (file_exists('admin/images/categories/' . $category->image)) {
                unlink('admin/images/categories/' . $category->image);
            }
            $image = time() . "." . $file->getClientOriginalExtension();
            $file->move('admin/images/categories/', $image);
        } else {
            $image = $category->image;
        }

        $category->update([
            'image' => $image,
            'name' => $request->name,
            'ename' => $request->ename,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->ename),

        ]);
        toastr()->success('دسته بندی با موفقیت ویرایش شد!', 'موفق', ['timeOut' => 5000]);
        return redirect()->route('categories.index');
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
        return view('admin.categories.trashed_list');
    }

}
