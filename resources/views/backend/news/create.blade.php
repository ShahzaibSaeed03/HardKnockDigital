@extends('layouts.backend')

@section('content')
<h3>Create News</h3>
<form action="{{ route('admin.news.store') }}" method="POST" enctype="multipart/form-data" class="mt-3">
  @csrf
  @include('backend.news.partials.form', ['button' => 'Create'])
</form>
@endsection
