<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;

class BlogController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->orderBy('sort_order')->get();
        $featured = BlogPost::published()->featured()->first();

        $seo = [
            'title' => 'Blog Factory & Co Plaisir 78 | Conseils, Recettes, Actualités',
            'description' => 'Blog Factory & Co Plaisir : conseils restaurant, recettes, breakfast américain, cheesecake, accès Mon Grand Plaisir. Yvelines, N12/A12.',
            'keywords' => 'blog factory co plaisir 78, conseils manger plaisir, recettes cheesecake breakfast, actualités restaurant mon grand plaisir yvelines',
            'canonical' => route('blog.index'),
        ];

        return view('pages.blog.index', compact('posts', 'featured', 'seo'));
    }

    public function show(string $slug)
    {
        $post = BlogPost::published()->where('slug', $slug)->firstOrFail();
        $related = BlogPost::published()
            ->where('id', '!=', $post->id)
            ->take(3)
            ->get();

        $seo = [
            'title' => $post->meta_title,
            'description' => $post->meta_description ?? $post->excerpt,
            'keywords' => '',
            'canonical' => route('blog.show', $post->slug),
        ];

        return view('pages.blog.show', compact('post', 'related', 'seo'));
    }
}
