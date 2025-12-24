@extends('layouts.backend')

@section('content')
<h3>{{ $title }}</h3>
<form action="{{ route('admin.announcements.store') }}" method="POST" class="mt-3" enctype="multipart/form-data" novalidate>
  @csrf
  @include('backend.announcements.partials.form', ['button' => 'Create'])
</form>
@endsection
