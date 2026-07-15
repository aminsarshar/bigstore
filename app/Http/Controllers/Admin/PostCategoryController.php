<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

use App\Models\PostCategory;

use Illuminate\Support\Str;

use App\Http\Requests\StorePostCategoryRequest;

use App\Http\Requests\UpdatePostCategoryRequest;

class PostCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = PostCategory::latest()->paginate(10);

        return view('admin.post-categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.post-categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostCategoryRequest $request)
    {

        PostCategory::create([

            'title' => $request->title,

            'slug' => $request->slug ?: Str::slug($request->title),

        ]);

        toastr()->success('دسته بندی با موفقیت ایجاد شد.');

        return redirect()->route('post-categories.index');
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
    public function edit(PostCategory $postCategory)
    {
        return view('admin.post-categories.edit', compact('postCategory'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostCategoryRequest $request, PostCategory $postCategory)
    {

        $postCategory->update([

            'title' => $request->title,

            'slug' => $request->slug ?: Str::slug($request->title),

        ]);

        toastr()->success('دسته بندی بروزرسانی شد.');

        return redirect()->route('post-categories.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(PostCategory $postCategory)
    {

        $postCategory->delete();

        toastr()->success('دسته بندی حذف شد.');

        return redirect()->back();
    }
}
