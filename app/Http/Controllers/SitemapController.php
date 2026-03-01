<?php

namespace App\Http\Controllers;

use App\Models\BlogPost;
use Illuminate\Support\Facades\Response;

class SitemapController extends Controller
{
    public function index()
    {
        $posts = BlogPost::published()->orderBy('updated_at', 'desc')->get();

        $content = view('sitemap', compact('posts'))->render();

        return Response::make($content, 200, [
            'Content-Type' => 'application/xml',
        ]);
    }

    public function robots()
    {
        $content = "User-agent: *\nAllow: /\nSitemap: " . route('sitemap');

        return Response::make($content, 200, [
            'Content-Type' => 'text/plain',
        ]);
    }
}
