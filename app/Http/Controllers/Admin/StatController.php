<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Stat;
use Illuminate\Http\Request;

class StatController extends Controller
{
    public function index()
    {
        $title = 'Stats';
        $items = Stat::latest()->paginate(10);
        return view('backend.stats.index', compact('title','items'));
    }

    public function create()
    {
        $title = 'Create Stat';
        return view('backend.stats.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'growth'   => 'required|numeric|min:0',
            'reach'    => 'required|numeric|min:0',
            'audience' => 'required|numeric|min:0',
        ]);

        Stat::create($data);
        return redirect()->route('admin.stats.index')->with('success','Stat created.');
    }

    public function edit(Stat $stat)
    {
        $title = 'Edit Stat';
        return view('backend.stats.edit', compact('stat','title'));
    }

    public function update(Request $request, Stat $stat)
    {
        $data = $request->validate([
            'growth'   => 'required|numeric|min:0',
            'reach'    => 'required|numeric|min:0',
            'audience' => 'required|numeric|min:0',
        ]);

        $stat->update($data);
        return redirect()->route('admin.stats.index')->with('success','Stat updated.');
    }

    public function destroy(Stat $stat)
    {
        $stat->delete();
        return redirect()->route('admin.stats.index')->with('success','Stat deleted.');
    }
}
