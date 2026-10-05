<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        return view('blog.index', [
            'posts' => BlogPost::with('category')->where('is_published', true)->latest('published_at')->paginate(9),
        ]);
    }

    public function show(BlogPost $post)
    {
        $related = BlogPost::where('blog_category_id', $post->blog_category_id)
            ->where('id', '!=', $post->id)->take(3)->get();

        return view('blog.show', compact('post', 'related'));
    }
}
