@extends('frontend.layouts.spapp2')
@section('title', 'News — Hard Knock Digital')

@section('content')
  {{-- Breadcrumb --}}
  <div class="breadcumb-wrapper" style="background-color: #0a0c00;">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">News</h1>
      </div>
    </div>
  </div>

  {{-- News Grid --}}
  <section class="blog__area space">
    <div class="container">
      <div class="blog__inner-wrap">
        <div class="row">
          <div class="col-100">
            <div class="blog-post-wrap">
              <div class="row gy-30 gutter-24">
                @forelse($news as $item)
                  @php
                    $thumb = $item->thumbnail
                      ? asset('storage/' . $item->thumbnail)
                      : asset('site/img/blog/placeholder.png');
                    $date = optional($item->created_at)->format('M d, Y');
                    $url = route('news.show', $item->slug ?: \Illuminate\Support\Str::slug($item->title . '-' . $item->id));
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
                            <li class="text-white">{{ $date }}</li>
                          </ul>
                        </div>
                        <h4 class="title">
                          <a href="{{ $url }}">{{ $item->title }}</a>
                        </h4>

                        @if(!empty($item->description))
                          <p class="drawer-desc">{{ \Illuminate\Support\Str::limit(strip_tags($item->description), 140) }}</p>
                        @endif

                        <a href="{{ $url }}" class="link-btn">
                          <span class="link-effect">
                            <span class="effect-1">READ MORE</span>
                            <span class="effect-1">READ MORE</span>
                          </span>
                          <img src="{{ asset('site/img/icon/arrow-left-top.svg') }}" alt="icon">
                        </a>
                      </div>
                    </div>
                  </div>
                @empty
                  <div class="col-12">
                    <p class="text-center mb-0">No news yet.</p>
                  </div>
                @endforelse
              </div>

              {{-- Pagination --}}
              @if(method_exists($news, 'hasPages') && $news->hasPages())
                <div class="pagination-wrap mt-50">
                  {{ $news->onEachSide(1)->links('vendor.pagination.bootstrap-4') }}
                </div>
              @endif
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

  {{-- Marquee --}}
  {{-- <div class="container-fluid p-0 overflow-hidden">
    <div class="slider__marquee clearfix marquee-wrap">
      <div class="marquee_mode marquee__group">
        <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> HKN — creative studio for bold, original
            content</a></h6>
        <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> News • Announcements — all in one
            place</a></h6>
        <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Culture-forward storytelling with real
            audience impact</a></h6>
        <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Credibility, craft, and results you can
            measure</a></h6>
      </div>
    </div>
  </div> --}}
@endsection

