@extends('layouts.backend')

@section('content')
<div class="page-header d-flex justify-content-between align-items-center">
  <h3 class="page-title mb-0">{{ $title }}</h3>
  <a href="{{ route('admin.shows.index') }}" class="btn btn-outline-secondary">Back</a>
</div>

@include('backend.shows.partials.form', ['action' => route('admin.shows.store'), 'method' => 'POST'])
@endsection
