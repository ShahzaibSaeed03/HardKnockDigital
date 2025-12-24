@extends('layouts.backend')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
  <h3 class="page-title mb-0">News</h3>
  <a href="{{ route('admin.news.create') }}" class="btn btn-primary">Add News</a>
</div>

@if(session('success'))
  <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="card mt-3">
  <div class="card-body table-responsive">
    <table class="table table-striped align-middle">
      <thead>
        <tr>
          <th>#</th>
          <th>Title</th>
          <th>Category</th>
          <th>Status</th>
          <th>Updated</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $i => $n)
          <tr>
            <td>{{ $items->firstItem() + $i }}</td>
            <td>{{ $n->title }}</td>
            <td>{{ $n->category ?? '-' }}</td>
            <td><span class="badge bg-{{ $n->status == 'published' ? 'success' : 'secondary' }}">{{ ucfirst($n->status) }}</span></td>
            <td>{{ $n->updated_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.news.edit', $n) }}" class="btn btn-sm btn-warning">Edit</a>
              <form action="{{ route('admin.news.destroy', $n) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this news?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form>
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">No news found.</td></tr>
        @endforelse
      </tbody>
    </table>
    {{ $items->links() }}
  </div>
</div>
@endsection
