<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Show;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Support\Str;

class ShowController extends Controller
{
    public function index()
    {
        $title = "Shows";
        $items = Show::latest()->paginate(10);
        return view('backend.shows.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = "Add Show";
        return view('backend.shows.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $this->validateData($request);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $original = $data['slug'];
        $count = 1;
        while (Show::where('slug', $data['slug'])->exists()) {
            $data['slug'] = $original . '-' . $count;
            $count++;
        }

        if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
            $data['banner_image'] = $this->storeFile($request->file('banner_image'), 'shows/banners');
        }
        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            $data['logo'] = $this->storeFile($request->file('logo'), 'shows/logos');
        }

        Show::create($data);

        return redirect()->route('admin.shows.index')->with('success', 'Show created successfully.');
    }

    public function edit(Show $show)
    {
        $title = "Edit Show";
        return view('backend.shows.edit', compact('show', 'title'));
    }

    public function update(Request $request, Show $show)
    {
        $data = $this->validateData($request, $show->id);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']);
        }

        $original = $data['slug'];
        $count = 1;
        while (Show::where('slug', $data['slug'])->where('id', '!=', $show->id)->exists()) {
            $data['slug'] = $original . '-' . $count;
            $count++;
        }

        if ($request->hasFile('banner_image') && $request->file('banner_image')->isValid()) {
            if ($show->banner_image) $this->deleteFile($show->banner_image);
            $data['banner_image'] = $this->storeFile($request->file('banner_image'), 'shows/banners');
        }

        if ($request->hasFile('logo') && $request->file('logo')->isValid()) {
            if ($show->logo) $this->deleteFile($show->logo);
            $data['logo'] = $this->storeFile($request->file('logo'), 'shows/logos');
        }

        $show->update($data);

        return redirect()->route('admin.shows.index')->with('success', 'Show updated successfully.');
    }

    public function destroy(Show $show)
    {
        if ($show->banner_image) $this->deleteFile($show->banner_image);
        if ($show->logo) $this->deleteFile($show->logo);
        $show->delete();

        return redirect()->route('admin.shows.index')->with('success', 'Show deleted successfully.');
    }

    /** ------------------------------
     *  Helpers
     *  -----------------------------*/
    private function validateData(Request $request, $id = null): array
    {
        return $request->validate([
            'title' => 'required|string|max:255',
            'slug'  => ['nullable', 'string', 'max:255', Rule::unique('shows', 'slug')->ignore($id)],
            'tagline' => 'nullable|string|max:255',
            'description_html' => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'logo' => 'nullable|image|mimes:jpg,jpeg,png,svg,webp|max:2048',
            'youtube_url' => 'nullable|url',
            'rumble_url' => 'nullable|url',
            'spotify_url' => 'nullable|url',
            'iheart_url' => 'nullable|url',
            'amazon_url' => 'nullable|url',
            'pandora_url' => 'nullable|url',
            'podbean_url' => 'nullable|url',
            'applepodcast_url' => 'nullable|url',
            'is_published' => 'nullable|boolean',
            'published_at' => 'nullable|date',
        ]);
    }

    private function storeFile($file, $folder)
    {
        $path = $file->store($folder, 'public');
        return $path;
    }

    private function deleteFile($path)
    {
        Storage::disk('public')->delete($path);
    }
}
