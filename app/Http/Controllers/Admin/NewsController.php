<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $title = "News";
        $items = News::latest()->paginate(10);
        return view('backend.news.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = "Create News";
        return view('backend.news.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:news,slug',
            'description' => 'nullable|string|max:300',
            'content'     => 'required|string',
            'category'    => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'status'      => 'required|in:draft,published',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        // Save thumbnail directly to public_html/storage/news
        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            $data['thumbnail'] = $this->storeThumbnail($request->file('thumbnail'), $data['title']); // returns 'news/<file>'
        }

        News::create($data);

        return redirect()->route('admin.news.index')->with('success', 'News created.');
    }

    public function edit(News $news)
    {
        $title = "Edit News";
        return view('backend.news.edit', compact('news', 'title'));
    }

    public function update(Request $request, News $news)
    {
        $data = $request->validate([
            'title'       => 'required|string|max:255',
            'slug'        => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'description' => 'nullable|string|max:300',
            'content'     => 'required|string',
            'category'    => 'nullable|string|max:100',
            'thumbnail'   => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'status'      => 'required|in:draft,published',
        ]);

        if (empty($data['slug'])) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        if ($request->hasFile('thumbnail') && $request->file('thumbnail')->isValid()) {
            if (!empty($news->thumbnail)) {
                $this->deletePublicFile($news->thumbnail);
            }
            $data['thumbnail'] = $this->storeThumbnail($request->file('thumbnail'), $data['title']); // returns 'news/<file>'
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('success', 'News updated.');
    }

    public function destroy(News $news)
    {
        if (!empty($news->thumbnail)) {
            $this->deletePublicFile($news->thumbnail);
        }
        $news->delete();

        return redirect()->route('admin.news.index')->with('success', 'News deleted successfully.');
    }

    /**
     * TinyMCE inline image upload: saves to public_html/storage/news/inline
     * Returns JSON with full URL.
     */
    public function editorUpload(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:jpg,jpeg,png,gif,webp|max:5120',
        ]);

        $webroot = $this->webroot(); // public_html
        $dir     = $webroot . '/storage/news/inline';

        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        $file = $request->file('file');
        $ext  = strtolower($file->getClientOriginalExtension() ?: $file->extension());
        $name = 'inline-' . time() . '-' . Str::random(6) . '.' . $ext;

        $file->move($dir, $name);

        // TinyMCE expects a full URL. This path is directly web-served.
        return response()->json([
            'location' => asset('storage/news/inline/' . $name),
        ]);
    }

    /**
     * Save thumbnail to public_html/storage/news and return DB path like 'news/<file>'.
     * (NO leading 'storage/' so Blade can safely do asset('storage/'.$path).)
     */
    private function storeThumbnail(\Illuminate\Http\UploadedFile $file, string $title): string
    {
        $ext  = strtolower($file->getClientOriginalExtension() ?: $file->extension());
        $name = Str::slug($title) . '-' . time() . '-' . Str::random(4) . '.' . $ext;

        $dir = $this->webroot() . '/storage/news'; // public_html/storage/news
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        $file->move($dir, $name);

        // Return WITHOUT 'storage/' prefix
        return 'news/' . $name;
    }

    /**
     * Delete given web path (supports 'news/..' and 'storage/news/..').
     */
    private function deletePublicFile(string $relative): void
    {
        $relative = ltrim($relative, '/');

        // Normalize to filesystem path under public_html
        if (strpos($relative, 'storage/') === 0) {
            $fs = $this->webroot() . '/' . $relative;                   // already 'storage/...'
        } else {
            $fs = $this->webroot() . '/storage/' . $relative;           // add 'storage/'
        }

        if (is_file($fs)) {
            @unlink($fs);
        }
    }

    /**
     * Absolute path to public_html (Hostinger webroot).
     */
    private function webroot(): string
    {
        return dirname(public_path()); // parent of .../public
    }
}
