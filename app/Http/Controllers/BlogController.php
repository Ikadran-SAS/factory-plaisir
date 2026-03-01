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
            'title'       => 'Guide du Voyageur Toulouse-Blagnac – Conseils & Astuces | Factory & Co',
            'description' => 'Le guide pratique de l\'Aéroport Toulouse-Blagnac : accès tramway T2, conseils transit, breakfast américain, cheesecake à emporter. Par Factory & Co.',
            'keywords'    => 'guide aéroport toulouse blagnac, conseils transit toulouse, tramway t2 aéroport toulouse, manger aéroport toulouse',
            'canonical'   => route('blog.index'),
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
            'title'       => $post->meta_title,
            'description' => $post->meta_description ?? $post->excerpt,
            'keywords'    => '',
            'canonical'   => route('blog.show', $post->slug),
        ];

        return view('pages.blog.show', compact('post', 'related', 'seo'));
    }
}
