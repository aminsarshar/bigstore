<?php

namespace App\Http\Controllers\Home;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Post;

class BlogController extends Controller
{
    public function index()
    {
        $userId = auth()->id();
        $categories = Category::query()->where('parent_id', 0)->get();
        $carts = Cart::query()->where('type', 'main')->where('user_id', $userId)->get();
        $featured = Post::where('status', 1)
            ->where('is_featured', 1)
            ->latest()
            ->first();

        return view('front.blog.index', compact('featured' , 'carts' , 'categories'));
    }

    public function show(Post $post)
    {
                $userId = auth()->id();
        $categories = Category::query()->where('parent_id', 0)->get();
        $carts = Cart::query()->where('type', 'main')->where('user_id', $userId)->get();
        abort_if(!$post->status, 404);

        $post->increment('views');

        $relatedPosts = Post::where('status', 1)
            ->where('post_category_id', $post->post_category_id)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(3)
            ->get();

        return view('front.blog.show', compact(
            'post',
            'relatedPosts',
            'categories',
            'carts',
        ));
    }
}
