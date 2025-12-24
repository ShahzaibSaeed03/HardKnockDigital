@extends('layouts.backend')

@section('content')
<h3>{{ $title }}</h3>
<form action="{{ route('admin.stats.update', $stat) }}" method="POST" class="mt-3" novalidate>
  @csrf @method('PUT')
  @include('backend.stats.partials.form', ['button' => 'Update'])
</form>
@endsection
