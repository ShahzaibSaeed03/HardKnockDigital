@if ($errors->any())
  <div class="alert alert-danger mt-3">
    <ul class="mb-0">
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<div class="card mt-3">
  <div class="card-body">
    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
      @csrf
      @if(($method ?? '') === 'PUT') @method('PUT') @endif

      <div class="row g-3">
        <div class="col-md-6">
          <label class="form-label">Title *</label>
          <input name="title" class="form-control" required
                 value="{{ old('title', $show->title ?? '') }}">
        </div>
        {{-- <div class="col-md-6">
          <label class="form-label">Slug <small class="text-muted">(auto if blank)</small></label>
          <input name="slug" class="form-control"
                 value="{{ old('slug', $show->slug ?? '') }}">
        </div> --}}

        <div class="col-md-12">
          <label class="form-label">Tagline</label>
          <input name="tagline" class="form-control"
                 value="{{ old('tagline', $show->tagline ?? '') }}">
        </div>

        <div class="col-md-6">
          <label class="form-label">Banner Image <small class="text-muted">1296×540 recommended</small></label>
          @if(!empty($show?->banner_image))
            <div class="mb-2">
              <img src="{{ asset('storage/'.$show->banner_image) }}" class="img-fluid rounded" style="max-height:140px">
            </div>
          @endif
          <input type="file" name="banner_image" class="form-control">
        </div>

        <div class="col-md-6">
          <label class="form-label">Logo <small class="text-muted">PNG/SVG with transparency preferred</small></label>
          @if(!empty($show?->logo))
            <div class="mb-2">
              <img src="{{ asset('storage/'.$show->logo) }}" class="img-fluid" style="max-height:100px">
            </div>
          @endif
          <input type="file" name="logo" class="form-control">
        </div>

        <div class="col-12">
          <label class="form-label">Description (HTML allowed)</label>
          <textarea name="description_html" rows="6" class="form-control">{{ old('description_html', $show->description_html ?? '') }}</textarea>
        </div>
      </div>

      <hr class="my-4">

      <h6 class="mb-3">Platforms</h6>
      <div class="row g-3">
        <div class="col-md-6"><input name="youtube_url" class="form-control" placeholder="YouTube URL" value="{{ old('youtube_url', $show->youtube_url ?? '') }}"></div>
        <div class="col-md-6"><input name="rumble_url" class="form-control" placeholder="Rumble URL" value="{{ old('rumble_url', $show->rumble_url ?? '') }}"></div>
        <div class="col-md-6"><input name="spotify_url" class="form-control" placeholder="Spotify URL" value="{{ old('spotify_url', $show->spotify_url ?? '') }}"></div>
        <div class="col-md-6"><input name="iheart_url" class="form-control" placeholder="iHeart URL" value="{{ old('iheart_url', $show->iheart_url ?? '') }}"></div>
        <div class="col-md-6"><input name="amazon_url" class="form-control" placeholder="Amazon Music URL" value="{{ old('amazon_url', $show->amazon_url ?? '') }}"></div>
        <div class="col-md-6"><input name="pandora_url" class="form-control" placeholder="Pandora URL" value="{{ old('pandora_url', $show->pandora_url ?? '') }}"></div>
        <div class="col-md-6"><input name="podbean_url" class="form-control" placeholder="Podbean URL" value="{{ old('podbean_url', $show->podbean_url ?? '') }}"></div>
        <div class="col-md-6"><input name="applepodcast_url" class="form-control" placeholder="Apple Podcast URL" value="{{ old('applepodcast_url', $show->applepodcast_url ?? '') }}"></div>
      </div>

      <hr class="my-4">

      <div class="row g-3">
        <div class="col-md-3 d-flex align-items-center">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" name="is_published" value="1"
                   {{ old('is_published', ($show->is_published ?? true)) ? 'checked' : '' }}>
            <label class="form-check-label">Published</label>
          </div>
        </div>
        {{-- <div class="col-md-9">
          <label class="form-label">Published At</label>
          <input type="datetime-local" name="published_at" class="form-control"
                 value="{{ old('published_at', isset($show->published_at) ? $show->published_at->format('Y-m-d\TH:i') : '') }}">
        </div> --}}
      </div>

      <div class="mt-4 d-flex gap-2">
        <button class="btn btn-primary">{{ ($method ?? '') === 'PUT' ? 'Update' : 'Create' }}</button>
        <a href="{{ route('admin.shows.index') }}" class="btn btn-outline-secondary">Cancel</a>
      </div>
    </form>
  </div>
</div>
