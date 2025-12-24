<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;
use App\Models\News;

class NewsController extends Controller {
public function index()
{
    $news = \App\Models\News::where('status','published')
        ->latest()
        ->paginate(12);

    return view('frontend.news.index', compact('news'));
}
public function show(string $slug)
{
    $item = \App\Models\News::where(function($q) use ($slug) {
            $q->where('slug', $slug);
        })
        ->orWhereRaw('LOWER(CONCAT(REPLACE(title, " ", "-"), "-", id)) = ?', [strtolower($slug)])
        ->where('status', 'published')
        ->firstOrFail();

    return view('frontend.news.show', compact('item'));
}
}
