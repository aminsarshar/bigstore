<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\PostRequest;
use App\Models\Category;
use App\Models\Post;
use App\Models\PostCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $posts = Post::with('category')

            ->when($request->filled('search'), function ($query) use ($request) {

                $query->where('title', 'like', '%' . $request->search . '%');
            })

            ->latest()

            ->paginate(10)

            ->withQueryString();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = PostCategory::latest()->get();

        return view('admin.posts.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostRequest $request)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $data['is_featured'] = $request->boolean('is_featured');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        // آپلود تصویر
        if ($request->hasFile('image')) {

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('admin/images/posts'), $imageName);

            $data['image'] = $imageName;
        }

        Post::create($data);

        return redirect()
            ->route('posts.index')
            ->with('success', 'مقاله با موفقیت ثبت شد.');
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
    public function edit(Post $post)
    {
        $categories = PostCategory::latest()->get();

        return view('admin.posts.edit', compact('post', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PostRequest $request, Post $post)
    {
        $data = $request->validated();

        $data['user_id'] = auth()->id();

        $data['is_featured'] = $request->boolean('is_featured');

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        if ($request->hasFile('image')) {

            if (
                $post->image &&
                file_exists(public_path('admin/images/posts/' . $post->image))
            ) {
                unlink(public_path('admin/images/posts/' . $post->image));
            }

            $image = $request->file('image');

            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();

            $image->move(public_path('admin/images/posts'), $imageName);

            $data['image'] = $imageName;
        }

        $post->update($data);

        return redirect()
            ->route('posts.index')
            ->with('success', 'مقاله با موفقیت بروزرسانی شد.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post)
    {
        if (
            $post->image &&
            file_exists(public_path('admin/images/posts/' . $post->image))
        ) {
            unlink(public_path('admin/images/posts/' . $post->image));
        }

        $post->delete();

        return redirect()
            ->route('posts.index')
            ->with('success', 'مقاله با موفقیت حذف شد.');
    }
}
