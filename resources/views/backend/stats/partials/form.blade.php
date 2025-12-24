<div class="card">
  <div class="card-body">
    <div class="row">
      <div class="col-md-4 mb-3">
        <label class="form-label">Growth</label>
        <input type="number" name="growth" class="form-control" min="0" step="1"
               value="{{ old('growth', $stat->growth ?? 0) }}" required>
        @error('growth')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Reach</label>
        <input type="number" name="reach" class="form-control" min="0" step="1"
               value="{{ old('reach', $stat->reach ?? 0) }}" required>
        @error('reach')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
      <div class="col-md-4 mb-3">
        <label class="form-label">Audience</label>
        <input type="number" name="audience" class="form-control" min="0" step="1"
               value="{{ old('audience', $stat->audience ?? 0) }}" required>
        @error('audience')<small class="text-danger">{{ $message }}</small>@enderror
      </div>
    </div>

    <button class="btn btn-primary">{{ $button }}</button>
    <a href="{{ route('admin.stats.index') }}" class="btn btn-light">Cancel</a>
  </div>
</div>
