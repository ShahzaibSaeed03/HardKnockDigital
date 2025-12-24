<div class="card">
  <div class="card-body">

    {{-- Title --}}
    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $news->title ?? '') }}" required>
      @error('title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Slug --}}
    <div class="mb-3">
      <label class="form-label">Slug (optional)</label>
      <input type="text" name="slug" class="form-control" value="{{ old('slug', $news->slug ?? '') }}">
      @error('slug')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Small Description --}}
    <div class="mb-3">
      <label class="form-label">Short Description <small class="text-muted">(max 300 chars)</small></label>
      <textarea name="description" rows="2" class="form-control" maxlength="300">{{ old('description', $news->description ?? '') }}</textarea>
      @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Category --}}
    <div class="mb-3">
      <label class="form-label">Category</label>
      <input type="text" name="category" class="form-control" value="{{ old('category', $news->category ?? '') }}">
      @error('category')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Content with TinyMCE --}}
    <div class="mb-3">
      <label class="form-label">Content <span class="text-danger">*</span></label>
      {{-- Leave required off here; we validate via JS because TinyMCE hides the textarea --}}
      <textarea id="content-editor" name="content" rows="10" class="form-control">{{ old('content', $news->content ?? '') }}</textarea>
      @error('content')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Thumbnail with live preview --}}
    <div class="mb-3">
      <label class="form-label">Thumbnail</label>
      <input type="file" name="thumbnail" id="thumbnail-input" class="form-control" accept="image/*">
      <div class="mt-2">
        <img id="thumbnail-preview"
             src="{{ !empty($news?->thumbnail) ? asset('storage/'.$news->thumbnail) : '' }}"
             alt="thumbnail preview"
             style="max-height: 120px; display: {{ !empty($news?->thumbnail) ? 'block' : 'none' }};">
      </div>
      @error('thumbnail')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- Status --}}
    <div class="mb-3">
      <label class="form-label">Status</label>
      @php $status = old('status', $news->status ?? 'draft'); @endphp
      <select name="status" class="form-control" required>
        <option value="draft" {{ $status=='draft'?'selected':'' }}>Draft</option>
        <option value="published" {{ $status=='published'?'selected':'' }}>Published</option>
      </select>
      @error('status')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <button class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admin.news.index') }}" class="btn btn-light">Cancel</a>
  </div>
</div>

{{-- TinyMCE 5 (No API key, fully functional) --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.9/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  (function () {
    const textarea = document.getElementById('content-editor');

    tinymce.init({
      selector: '#content-editor',
      height: 700, // comfortable editor height
      menubar: 'file edit view insert format tools table help',
      plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | removeformat | fullscreen code preview',
      toolbar_mode: 'floating',
      branding: false,
      paste_data_images: true,
      automatic_uploads: true,
      images_upload_url: '{{ route('admin.editor.upload') }}',
      images_reuse_filename: false,
      convert_urls: false,
      file_picker_types: 'image',
      image_title: true,
      images_upload_credentials: true,
      relative_urls: false,
      remove_script_host: false,

      // CSRF for Laravel
      headers: { 'X-CSRF-TOKEN': '{{ csrf_token() }}' },

      setup(editor) {
        // Remove required attribute from hidden textarea (prevents Chrome "not focusable" error)
        editor.on('init', () => {
          if (textarea) textarea.removeAttribute('required');
        });
      },

      content_style: 'body { font-family: Helvetica, Arial, sans-serif; font-size: 15px; line-height: 1.7; padding: 10px; }'
    });

    // Client-side validation: ensure content is not empty before submit
    document.addEventListener('DOMContentLoaded', function () {
      // Use the closest form containing this partial (safer than document.querySelector('form'))
      const form = textarea ? textarea.closest('form') : null;
      if (!form) return;

      form.addEventListener('submit', function (e) {
        const editor = tinymce.get('content-editor');
        if (editor) {
          // push HTML back to the hidden <textarea name="content">
          tinymce.triggerSave();

          const text = editor.getContent({ format: 'text' }).trim();
          if (!text.length) {
            e.preventDefault();
            alert('Content is required.');
            editor.focus();
            return false;
          }
        }
      }, true);
    });

    // Thumbnail live preview
    const input = document.getElementById('thumbnail-input');
    const preview = document.getElementById('thumbnail-preview');
    if (input && preview) {
      input.addEventListener('change', function (e) {
        const file = e.target.files && e.target.files[0];
        if (!file) { preview.style.display = 'none'; preview.src=''; return; }
        const url = URL.createObjectURL(file);
        preview.src = url; preview.style.display = 'block';
      });
    }
  })();
</script>
