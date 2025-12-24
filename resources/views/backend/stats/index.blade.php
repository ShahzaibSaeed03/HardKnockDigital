@extends('layouts.backend')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
  <h3 class="page-title mb-0">{{ $title }}</h3>
</div>

@if(session('success'))
  <div class="alert alert-success mt-3">{{ session('success') }}</div>
@endif

<div class="card mt-3">
  <div class="card-body table-responsive">
    <table class="table align-middle">
      <thead>
        <tr>
          {{-- <th>#</th> --}}
          <th>Growth</th>
          <th>Reach</th>
          <th>Audience</th>
          <th>Updated</th>
          <th class="text-end">Actions</th>
        </tr>
      </thead>
      <tbody>
        @forelse($items as $i => $s)
          <tr>
            {{-- <td>{{ $items->firstItem() + $i }}</td> --}}
            <td>{{ number_format($s->growth) }}</td>
            <td>{{ number_format($s->reach) }}</td>
            <td>{{ number_format($s->audience) }}</td>
            <td>{{ $s->updated_at->format('Y-m-d H:i') }}</td>
            <td class="text-end">
              <a href="{{ route('admin.stats.edit', $s) }}" class="btn btn-sm btn-warning">Edit</a>
              {{-- <form action="{{ route('admin.stats.destroy', $s) }}" method="POST" class="d-inline" onsubmit="return confirm('Delete this stat?')">
                @csrf @method('DELETE')
                <button class="btn btn-sm btn-danger">Delete</button>
              </form> --}}
            </td>
          </tr>
        @empty
          <tr><td colspan="6" class="text-center text-muted">No stats yet.</td></tr>
        @endforelse
      </tbody>
    </table>
    {{ $items->links() }}
  </div>
</div>
@endsection
