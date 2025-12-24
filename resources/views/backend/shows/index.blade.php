@extends('layouts.backend')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
  <h3 class="page-title mb-0">{{ $title }}</h3>
  <a href="{{ route('admin.shows.create') }}" class="btn btn-primary">Add Show</a>
</div>

@if(session('success'))
  <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="card mt-3">
  <div class="card-body table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Banner</th>
          <th>Logo</th>
          <th>Published</th>
          <th>Updated</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $i => $s)
          <tr>
            <td>{{ $items->firstItem() + $i }}</td>
            <td>
              <div class="fw-semibold">{{ $s->title }}</div>
              <small class="text-muted">/shows/{{ $s->slug }}</small>
            </td>
            <td style="width:140px">
              @if($s->banner_image)
                <img src="{{ asset('storage/'.$s->banner_image) }}" alt="banner" style="height:48px" class="rounded">
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td style="width:120px">
              @if($s->logo)
                <img src="{{ asset('storage/'.$s->logo) }}" alt="logo" style="height:36px">
              @else
                <span class="text-muted">—</span>
              @endif
            </td>
            <td>
              @if($s->is_published)
                <span class="badge bg-success">Yes</span>
              @else
                <span class="badge bg-secondary">No</span>
              @endif
            </td>
            <td>{{ $s->updated_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-warning" href="{{ route('admin.shows.edit', $s) }}">Edit</a>
              <form action="{{ route('admin.shows.destroy', $s) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this show?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center text-muted">No shows found.</td></tr>
        @endforelse
      </tbody>
    </table>
    {{ $items->links() }}
  </div>
</div>
@endsection
