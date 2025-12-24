@extends('frontend.layouts.spapp2')
@section('title', $item->title . ' — Hard Knock Digital')

@section('content')
  {{-- Breadcrumb --}}
  <!--<div class="breadcumb-wrapper style2 bg-smoke">-->
  <!--  <div class="container-fluid">-->
  <!--    <div class="breadcumb-content">-->
  <!--      <ul class="breadcumb-menu">-->
  <!--        <li><a href="{{ route('home') }}">Home</a></li>-->
  <!--        <li><a href="{{ route('news.list') }}">News</a></li>-->
  <!--        <li>{{ \Illuminate\Support\Str::limit($item->title, 60) }}</li>-->
  <!--      </ul>-->
  <!--    </div>-->
  <!--  </div>-->
  <!--</div>-->

  {{-- News details --}}
  <section class="blog__details-area space">
    <div class="container">
      <div class="blog__inner-wrap">
        <div class="row">
          <div class="col-100">
            <div class="blog__details-wrap">

              {{-- Hero/featured image --}}
              <div class="blog__details-thumb">
                @php
                  $hero = $item->thumbnail ? asset('storage/' . $item->thumbnail)
                    : asset('site/img/blog/placeholder-wide.jpg');
                @endphp
                <img src="{{ $hero }}" alt="{{ $item->title }}">
              </div>

              <div style="background-color:#000; color:#fff; padding:20px; border-radius:8px;">
                <div class="blog__details-content">
                  <div class="blog-post-meta">
                    <ul class="list-wrap">
                      <li class="text-white">{{ optional($item->created_at)->format('M d, Y') }}</li>
                      @if(!empty($item->category))
                        <li><a href="{{ route('news.list') }}" style="color:#fff;">{{ $item->category }}</a></li>
                      @endif
                    </ul>
                  </div>

                  <h2 class="title text-white">{{ $item->title }}</h2>

                  @if(!empty($item->description))
                    <p class="text-white">{{ $item->description }}</p>
                  @endif
                </div>
              </div>

              <div class="mt-30">
                {!! $item->content !!}
              </div>

              {{-- Prev / Next --}}
              @php
                $prev = \App\Models\News::where('status', 'published')
                  ->where('id', '<', $item->id)
                  ->orderBy('id', 'desc')
                  ->first();

                $next = \App\Models\News::where('status', 'published')
                  ->where('id', '>', $item->id)
                  ->orderBy('id', 'asc')
                  ->first();

                $prevUrl = $prev
                  ? route('news.show', $prev->slug ?: \Illuminate\Support\Str::slug($prev->title . '-' . $prev->id))
                  : null;
                $nextUrl = $next
                  ? route('news.show', $next->slug ?: \Illuminate\Support\Str::slug($next->title . '-' . $next->id))
                  : null;
              @endphp

              <div class="inner__page-nav space-top mt-n1 mb-n1">
                @if($prevUrl)
                  <a href="{{ $prevUrl }}" class="nav-btn">
                    <i class="fa fa-arrow-left"></i>
                    <span>
                      <span class="link-effect">
                        <span class="effect-1">Previous News</span>
                        <span class="effect-1">Previous News</span>
                      </span>
                    </span>
                  </a>
                @endif

                @if($nextUrl)
                  <a href="{{ $nextUrl }}" class="nav-btn">
                    <span>
                      <span class="link-effect">
                        <span class="effect-1">Next News</span>
                        <span class="effect-1">Next News</span>
                      </span>
                    </span>
                    <i class="fa fa-arrow-right"></i>
                  </a>
                @endif
              </div>

            </div> {{-- /.blog__details-content --}}
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