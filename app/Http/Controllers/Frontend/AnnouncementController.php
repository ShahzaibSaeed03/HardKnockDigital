<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Announcement;

class AnnouncementController extends Controller
{
    public function index()
    {
        $announcements = Announcement::query()
            ->latest()
            ->paginate(12);

        return view('frontend.announcements.index', compact('announcements'));
    }

     public function show($slug)
    {
        $announcement = Announcement::where('status', 'published')
            ->where(function ($q) use ($slug) {
                $q->where('slug', $slug)
                ->orWhereRaw('LOWER(CONCAT(REPLACE(title, " ", "-"), "-", id)) = ?', [strtolower($slug)]);
            })
            ->firstOrFail();

        $prev = Announcement::where('id', '<', $announcement->id)->orderBy('id', 'desc')->first();
        $next = Announcement::where('id', '>', $announcement->id)->orderBy('id', 'asc')->first();

        return view('frontend.announcements.show', compact('announcement', 'prev', 'next'));
    }
}
