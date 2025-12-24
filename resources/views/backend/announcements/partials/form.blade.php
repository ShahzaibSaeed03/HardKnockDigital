<div class="card">
  <div class="card-body">

    <div class="mb-3">
      <label class="form-label">Title</label>
      <input type="text" name="title" class="form-control" value="{{ old('title', $announcement->title ?? '') }}" required>
      @error('title')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Short Description <small class="text-muted">(max 300 chars)</small></label>
      <textarea name="description" rows="2" class="form-control" maxlength="300">{{ old('description', $announcement->description ?? '') }}</textarea>
      @error('description')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <div class="mb-3">
      <label class="form-label">Content <span class="text-danger">*</span></label>
      <textarea id="content-editor" name="content" rows="10" class="form-control">{{ old('content', $announcement->content ?? '') }}</textarea>
      @error('content')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- ✅ Featured Image (extra field) --}}
    <div class="mb-3">
      <label class="form-label">Featured Image</label>
      <input type="file" name="featured_image" id="featured-image-input" class="form-control" accept="image/*">
      <div class="mt-2">
        <img id="featured-image-preview"
             src="{{ !empty($announcement?->featured_image) ? asset('storage/'.$announcement->featured_image) : '' }}"
             alt="featured"
             style="max-height: 120px; display: {{ !empty($announcement?->featured_image) ? 'block' : 'none' }};">
      </div>
      @error('featured_image')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    {{-- <div class="row">
      <div class="col-md-6 mb-3">
        <label class="form-label">Starts At (optional)</label>
        <input type="datetime-local" name="starts_at"
          value="{{ old('starts_at', isset($announcement->starts_at) ? $announcement->starts_at->format('Y-m-d\TH:i') : '') }}"
          class="form-control">
        @error('starts_at')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="col-md-6 mb-3">
        <label class="form-label">Ends At (optional)</label>
        <input type="datetime-local" name="ends_at"
          value="{{ old('ends_at', isset($announcement->ends_at) ? $announcement->ends_at->format('Y-m-d\TH:i') : '') }}"
          class="form-control">
        @error('ends_at')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
    </div> --}}

    <div class="mb-3">
      <label class="form-label">Status</label>
      @php $status = old('status', $announcement->status ?? 'draft'); @endphp
      <select name="status" class="form-control" required>
        <option value="draft" {{ $status == 'draft' ? 'selected' : '' }}>Draft</option>
        <option value="published" {{ $status == 'published' ? 'selected' : '' }}>Published</option>
      </select>
      @error('status')<small class="text-danger">{{ $message }}</small>@enderror
    </div>

    <button class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admin.announcements.index') }}" class="btn btn-light">Cancel</a>
  </div>
</div>

{{-- TinyMCE 5 (no API key) --}}
<script src="https://cdn.jsdelivr.net/npm/tinymce@5.10.9/tinymce.min.js" referrerpolicy="origin"></script>
<script>
  (function () {
    const textarea = document.getElementById('content-editor');

    tinymce.init({
      selector: '#content-editor',
      height: 700,
      menubar: 'file edit view insert format tools table help',
      plugins: 'advlist autolink lists link image charmap preview anchor searchreplace visualblocks code fullscreen insertdatetime media table paste help wordcount',
      toolbar: 'undo redo | formatselect | bold italic underline forecolor backcolor | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image media table | removeformat | fullscreen code preview',
      toolbar_mode: 'floating',
      branding: false,
      paste_data_images: true,
      convert_urls: false,
      setup(editor){
        editor.on('init', () => { if (textarea) textarea.removeAttribute('required'); });
      },
      content_style: 'body { font-family: Helvetica, Arial, sans-serif; font-size: 15px; line-height: 1.7; padding: 10px; }'
    });

    // Client-side validation for content + sync to textarea
    document.addEventListener('DOMContentLoaded', function () {
      const form = textarea ? textarea.closest('form') : null;
      if (!form) return;
      form.addEventListener('submit', function (e) {
        const ed = tinymce.get('content-editor');
        if (ed) {
          tinymce.triggerSave();
          const text = ed.getContent({ format: 'text' }).trim();
          if (!text.length) {
            e.preventDefault();
            alert('Content is required.');
            ed.focus();
          }
        }
      }, true);
    });

    // Featured image live preview
    const fi = document.getElementById('featured-image-input');
    const fp = document.getElementById('featured-image-preview');
    if (fi && fp) {
      fi.addEventListener('change', function (e) {
        const f = e.target.files && e.target.files[0];
        if (!f) { fp.style.display = 'none'; fp.src = ''; return; }
        fp.src = URL.createObjectURL(f);
        fp.style.display = 'block';
      });
    }
  })();
</script>
