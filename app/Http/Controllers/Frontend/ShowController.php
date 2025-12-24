<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Show;

class ShowController extends Controller
{
    public function index()
    {
        // fetch only published shows
        $shows = Show::where('is_published', 1)
            ->orderByDesc('published_at')
            ->get();

        return view('frontend.shows.index', compact('shows'));
    }

    public function show(string $slug)
    {
        $show = Show::where('slug', $slug)
            ->where('is_published', 1)
            ->firstOrFail();

        return view('frontend.shows.show', compact('show'));
    }
}
