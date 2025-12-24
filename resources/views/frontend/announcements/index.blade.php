@extends('frontend.layouts.spapp2')
@section('title', 'Announcements — Hard Knock Digital')

@section('content')
  {{-- Breadcrumb --}}
  <div class="breadcumb-wrapper" style="background-color: #0a0c00;">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">Announcements</h1>
      </div>
    </div>
  </div>

  {{-- Announcements Grid --}}
  <section class="blog__area space">
    <div class="container">
      <div class="blog__inner-wrap">
        <div class="row">
          <div class="col-100">
            <div class="blog-post-wrap">
              <div class="row gy-30 gutter-24">
                @forelse($announcements as $item)
                  @php
                    // Image fallback (try thumbnail if you add one later, else featured_image, else placeholder)
                    $thumb = $item->thumbnail
                      ? asset('storage/' . $item->thumbnail)
                      : ($item->featured_image
                          ? asset('storage/' . $item->featured_image)
                          : asset('site/img/blog/placeholder.png'));

                    // Date (optional() avoids null errors)
                    $date = optional($item->created_at)->format('M d, Y');

                    // URL (fallback to slugified title-id if slug missing)
                    $url = route('announcements.show', $item->slug ?: \Illuminate\Support\Str::slug(($item->title ?? 'announcement') . '-' . ($item->id ?? '')));

                    // Description/excerpt source (pick the first available)
                    $rawDesc = $item->summary
                      ?? $item->description
                      ?? $item->description_html
                      ?? '';
                    $desc = \Illuminate\Support\Str::limit(strip_tags($rawDesc), 140);
                  @endphp

                  <div class="col-md-3">
                    <div class="blog-post-item-two">
                      <div class="blog-post-thumb">
                        <a href="{{ $url }}">
                          <img src="{{ $thumb }}" alt="{{ $item->title }}">
                        </a>
                      </div>
                      <div class="blog-post-content">
                        <div class="blog-post-meta">
                          <ul class="list-wrap">
                            @if($date)
                              <li class="text-white">{{ $date }}</li>
                            @endif
                          </ul>
                        </div>

                        <h4 class="title">
                          <a href="{{ $url }}">{{ $item->title }}</a>
                        </h4>

                        @if(!empty($rawDesc))
                          <p class="drawer-desc">{{ $desc }}</p>
                        @endif

                        <a href="{{ $url }}" class="link-btn">
                          <span class="link-effect">
                            <span class="effect-1">VIEW ANNOUNCEMENT</span>
                            <span class="effect-1">VIEW ANNOUNCEMENT</span>
                          </span>
                          <img src="{{ asset('site/img/icon/arrow-left-top.svg') }}" alt="icon">
                        </a>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="col-12">
                    <p class="text-center mb-0">No announcements yet.</p>
                  </div>
                @endforelse
              </div>

              {{-- Pagination --}}
              @if(method_exists($announcements, 'hasPages') && $announcements->hasPages())
                <div class="pagination-wrap mt-50">
                  {{ $announcements->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
@endsection
