@extends('layouts.backend')

@section('content')
<h3>{{ $title }}</h3>
<form action="{{ route('admin.announcements.update', $announcement) }}" method="POST" class="mt-3" enctype="multipart/form-data" novalidate>
  @csrf @method('PUT')
  @include('backend.announcements.partials.form', ['button' => 'Update'])
</form>
@endsection
