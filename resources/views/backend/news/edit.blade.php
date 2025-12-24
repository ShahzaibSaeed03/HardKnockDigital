@extends('layouts.backend')

@section('content')
<h3>Edit News</h3>
<form action="{{ route('admin.news.update', $news) }}" method="POST" enctype="multipart/form-data" class="mt-3">
  @csrf @method('PUT')
  @include('backend.news.partials.form', ['button' => 'Update'])
</form>
@endsection
