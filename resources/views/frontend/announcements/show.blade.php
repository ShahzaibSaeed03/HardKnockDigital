@extends('frontend.layouts.spapp2')
@section('title', $announcement->title . ' — Hard Knock Digital')

@section('content')
  {{-- Breadcrumb (hidden to match News UI) --}}
  {{-- <div class="breadcumb-wrapper style2 bg-smoke"> ... </div> --}}

  {{-- Details (same structure/classes as News show) --}}
  <section class="blog__details-area space">
    <div class="container">
      <div class="blog__inner-wrap">
        <div class="row">
          <div class="col-100">
            <div class="blog__details-wrap">

              {{-- Hero / featured image (use thumbnail if present; else featured_image; else placeholder) --}}
              <div class="blog__details-thumb">
                @php
                  $hero = $announcement->thumbnail
                      ? asset('storage/' . $announcement->thumbnail)
                      : ($announcement->featured_image
                          ? asset('storage/' . $announcement->featured_image)
                          : asset('site/img/blog/placeholder-wide.jpg'));
                @endphp
                <img src="{{ $hero }}" alt="{{ $announcement->title }}">
              </div>

              {{-- Meta + title + short description (black box like News) --}}
              <div style="background-color:#000; color:#fff; padding:20px; border-radius:8px;">
                <div class="blog__details-content">
                  <div class="blog-post-meta">
                    <ul class="list-wrap">
                      <li class="text-white">{{ optional($announcement->created_at)->format('M d, Y') }}</li>
                      @if(!empty($announcement->category))
                        <li><a href="{{ route('announcements.list') }}" style="color:#fff;">{{ $announcement->category }}</a></li>
                      @endif
                    </ul>
                  </div>

                  <h2 class="title text-white">{{ $announcement->title }}</h2>

                  @php
                    $desc = $announcement->short_description
                      ?? $announcement->summary
                      ?? $announcement->description
                      ?? null;
                  @endphp

                  @if(!empty($desc))
                    <p class="text-white">{{ $desc }}</p>
                  @endif
                </div>
              </div>

              {{-- Main content (from TinyMCE / HTML) --}}
              <div class="mt-30">
                {!! $announcement->content !!}
              </div>

              {{-- Prev / Next (mirrors News; with safe slug fallbacks) --}}
              @php
                $prev = \App\Models\Announcement::where('status', 'published')
                  ->where('id', '<', $announcement->id)
                  ->orderBy('id', 'desc')
                  ->first();

                $next = \App\Models\Announcement::where('status', 'published')
                  ->where('id', '>', $announcement->id)
                  ->orderBy('id', 'asc')
                  ->first();

                $prevUrl = $prev
                  ? route('announcements.show', $prev->slug ?: \Illuminate\Support\Str::slug(($prev->title ?? 'announcement') . '-' . ($prev->id ?? '')))
                  : null;

                $nextUrl = $next
                  ? route('announcements.show', $next->slug ?: \Illuminate\Support\Str::slug(($next->title ?? 'announcement') . '-' . ($next->id ?? '')))
                  : null;
              @endphp

              <div class="inner__page-nav space-top mt-n1 mb-n1">
                @if($prevUrl)
                  <a href="{{ $prevUrl }}" class="nav-btn">
                    <i class="fa fa-arrow-left"></i>
                    <span>
                      <span class="link-effect">
                        <span class="effect-1">Previous Announcement</span>
                        <span class="effect-1">Previous Announcement</span>
                      </span>
                    </span>
                  </a>
                @endif

                @if($nextUrl)
                  <a href="{{ $nextUrl }}" class="nav-btn">
                    <span>
                      <span class="link-effect">
                        <span class="effect-1">Next Announcement</span>
                        <span class="effect-1">Next Announcement</span>
                      </span>
                    </span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                @endif
              </div>

            </div> {{-- /.blog__details-wrap --}}
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
