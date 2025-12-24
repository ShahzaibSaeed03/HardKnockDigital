@extends('layouts.backend')

@section('styles')
    <!-- Chart CSS -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/morris/morris.css') }}">
@endsection

@section('page-header')
<div class="row">
    <div class="col-sm-12">
        <h3 class="page-title">Welcome {{ auth()->user()->username ?? 'User' }}!</h3>
        <ul class="breadcrumb">
            <li class="breadcrumb-item active">Dashboard</li>
        </ul>
    </div>
</div>
@endsection

@section('content')
@php
    // safe defaults to avoid "undefined variable" or null warnings
    $newsCount          = $newsCount          ?? 0;
    $announcementCount  = $announcementCount  ?? 0;
    $growthTotal        = $growthTotal        ?? 0;
    $reachTotal         = $reachTotal         ?? 0;
    $audienceTotal      = $audienceTotal      ?? 0;
@endphp

{{-- Top counters: News / Announcements / Growth / Reach / Audience --}}
<div class="row">
    <div class="col-md-6 col-lg-4 col-xl-6">
        <div class="card dash-widget">
            <div class="card-body p-5">
                <span class="dash-widget-icon"><i class="fa fa-newspaper-o"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ number_format($newsCount) }}</h3>
                    <span>News</span>
                </div>
                <a class="stretched-link" href="{{ route('admin.news.index') }}"></a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl-6">
        <div class="card dash-widget">
            <div class="card-body p-5">
                <span class="dash-widget-icon"><i class="fa fa-bullhorn"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ number_format($announcementCount) }}</h3>
                    <span>Announcements</span>
                </div>
                <a class="stretched-link" href="{{ route('admin.announcements.index') }}"></a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body p-5">
                <span class="dash-widget-icon"><i class="fa fa-arrow-up"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ number_format($growthTotal) }}</h3>
                    <span>Growth (Total)</span>
                </div>
                <a class="stretched-link" href="{{ route('admin.stats.index') }}"></a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body p-5">
                <span class="dash-widget-icon"><i class="fa fa-signal"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ number_format($reachTotal) }}</h3>
                    <span>Reach (Total)</span>
                </div>
                <a class="stretched-link" href="{{ route('admin.stats.index') }}"></a>
            </div>
        </div>
    </div>

    <div class="col-md-6 col-lg-4 col-xl-4">
        <div class="card dash-widget">
            <div class="card-body p-5">
                <span class="dash-widget-icon"><i class="fa fa-users"></i></span>
                <div class="dash-widget-info">
                    <h3>{{ number_format($audienceTotal) }}</h3>
                    <span>Audience (Total)</span>
                </div>
                <a class="stretched-link" href="{{ route('admin.stats.index') }}"></a>
            </div>
        </div>
    </div>
</div>

@endsection

@section('scripts')
    <!-- Chart JS -->
    <script src="{{ asset('assets/plugins/morris/morris.min.js') }}"></script>
    <script src="{{ asset('assets/plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('assets/js/chart.js') }}"></script>
@endsection
