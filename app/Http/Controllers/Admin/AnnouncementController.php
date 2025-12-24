<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AnnouncementController extends Controller
{
    public function index()
    {
        $title = 'Announcements';
        $items = Announcement::latest()->paginate(10);
        return view('backend.announcements.index', compact('title', 'items'));
    }

    public function create()
    {
        $title = 'Create Announcement';
        return view('backend.announcements.create', compact('title'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:300',
            'content'        => 'required|string',
            'featured_image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'status'         => 'required|in:draft,published',
            'starts_at'      => 'nullable|date',
            'ends_at'        => 'nullable|date|after_or_equal:starts_at',
        ]);

        if (empty($data['slug'] ?? null)) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        // Save featured image to public_html/storage/announcements
        if ($request->hasFile('featured_image') && $request->file('featured_image')->isValid()) {
            $data['featured_image'] = $this->storeFeaturedImage($request->file('featured_image'), $data['title']); // returns 'announcements/<file>'
        }

        Announcement::create($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement created.');
    }

    public function edit(Announcement $announcement)
    {
        $title = 'Edit Announcement';
        return view('backend.announcements.edit', compact('announcement', 'title'));
    }

    public function update(Request $request, Announcement $announcement)
    {
        $data = $request->validate([
            'title'          => 'required|string|max:255',
            'description'    => 'nullable|string|max:300',
            'content'        => 'required|string',
            'featured_image' => 'nullable|mimes:jpg,jpeg,png,gif,webp|max:4096',
            'status'         => 'required|in:draft,published',
            'starts_at'      => 'nullable|date',
            'ends_at'        => 'nullable|date|after_or_equal:starts_at',
        ]);

        if (empty($data['slug'] ?? null)) {
            $data['slug'] = Str::slug($data['title']) . '-' . Str::random(6);
        }

        if ($request->hasFile('featured_image') && $request->file('featured_image')->isValid()) {
            if (!empty($announcement->featured_image)) {
                $this->deletePublicFile($announcement->featured_image);
            }
            $data['featured_image'] = $this->storeFeaturedImage($request->file('featured_image'), $data['title']); // returns 'announcements/<file>'
        }

        $announcement->update($data);

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement updated.');
    }

    public function destroy(Announcement $announcement)
    {
        if (!empty($announcement->featured_image)) {
            $this->deletePublicFile($announcement->featured_image);
        }
        $announcement->delete();

        return redirect()->route('admin.announcements.index')->with('success', 'Announcement deleted.');
    }

    /**
     * Save uploaded image to public_html/storage/announcements and return DB path like 'announcements/<name>'.
     * (NO leading 'storage/' so Blade can do asset('storage/'.$path))
     */
    private function storeFeaturedImage(\Illuminate\Http\UploadedFile $file, string $title): string
    {
        $ext  = strtolower($file->getClientOriginalExtension() ?: $file->extension());
        $name = Str::slug($title) . '-' . time() . '-' . Str::random(4) . '.' . $ext;

        $dir = $this->webroot() . '/storage/announcements'; // public_html/storage/announcements
        if (!is_dir($dir) && !@mkdir($dir, 0755, true)) {
            throw new \RuntimeException("Cannot create dir: $dir");
        }
        if (!is_writable($dir)) {
            throw new \RuntimeException("Directory not writable: $dir");
        }

        $file->move($dir, $name);
        $full = $dir . '/' . $name;
        if (!is_file($full)) {
            throw new \RuntimeException("Move failed, file not found at: $full");
        }

        // DB value WITHOUT 'storage/' prefix
        return 'announcements/' . $name;
    }

    /**
     * Delete a file by web path; supports 'announcements/..' and 'storage/announcements/..'.
     */
    private function deletePublicFile(string $relative): void
    {
        $relative = ltrim($relative, '/');

        // Normalize to filesystem path under public_html
        if (strpos($relative, 'storage/') === 0) {
            $fs = $this->webroot() . '/' . $relative;                    // already 'storage/...'
        } else {
            $fs = $this->webroot() . '/storage/' . $relative;            // add 'storage/'
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
