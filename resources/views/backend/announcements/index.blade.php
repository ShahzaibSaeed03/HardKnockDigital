@extends('layouts.backend')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
  <h3 class="page-title mb-0">{{ $title }}</h3>
  <a href="{{ route('admin.announcements.create') }}" class="btn btn-primary">Add Announcement</a>
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
          <th>Image</th>
          <th>Status</th>
          {{-- <th>Window</th> --}}
          <th>Updated</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $i => $a)
          <tr>
            <td>{{ $items->firstItem() + $i }}</td>
            <td>{{ $a->title }}</td>
            <td>
              @if($a->featured_image)
                <img src="{{ asset('storage/'.$a->featured_image) }}" alt="img" style="height:40px">
              @endif
            </td>
            <td><span class="badge bg-{{ $a->status == 'published' ? 'success' : 'secondary' }}">{{ ucfirst($a->status) }}</span></td>
            {{-- <td>
              {{ $a->starts_at ? $a->starts_at->format('Y-m-d H:i') : '—' }}
              —
              {{ $a->ends_at ? $a->ends_at->format('Y-m-d H:i') : '—' }}
            </td> --}}
            <td>{{ $a->updated_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a class="btn btn-sm btn-warning" href="{{ route('admin.announcements.edit', $a) }}">Edit</a>
              <form action="{{ route('admin.announcements.destroy', $a) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this announcement?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="7" class="text-center text-muted">No announcements found.</td></tr>
        @endforelse
      </tbody>
    </table>
    {{ $items->links() }}
  </div>
</div>
@endsection
