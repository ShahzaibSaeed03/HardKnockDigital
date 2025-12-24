@extends('layouts.backend')

@section('content')
<h3>{{ $title ?? 'Create Stat' }}</h3>

<form action="{{ route('stats.store') }}" method="POST" class="mt-3" novalidate>
  @csrf
  @include('backend.stats.partials.form', ['button' => 'Create'])
</form>
@endsection
