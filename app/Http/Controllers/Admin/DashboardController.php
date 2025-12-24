<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\Announcement;
use App\Models\Stat;

class DashboardController extends Controller
{
    public function index()
    {
        $title              = 'Dashboard';
        $newsCount          = News::count();
        $announcementCount  = Announcement::count();
        $growthTotal        = (int) Stat::sum('growth');
        $reachTotal         = (int) Stat::sum('reach');
        $audienceTotal      = (int) Stat::sum('audience');

        return view('backend.dashboard', compact(
            'title',
            'newsCount',
            'announcementCount',
            'growthTotal',
            'reachTotal',
            'audienceTotal'
        ));
    }
}
