@extends('frontend.layouts.spapp2')
@section('title', $show->title . '')

@section('content')
    <div class="show-hero" style="background-image:url('{{ asset('storage/' . $show->banner_image) }}')">
        {{-- <div class="show-veil"></div> --}}
        <div class="container text-center text-white" style="top: 110px; position: relative;">
            {{-- <img src="{{ asset('storage/' . $show->logo) }}" alt="{{ $show->title }}" class="show-logo mb-4"> --}}
            {{-- <p class="show-tagline">{{ $show->tagline }}</p> --}}
            {{-- <p class="show-tagline text-white">{!! $show->description_html !!}</p> --}}
        </div>
    </div>

    <section class="show-desc mt-5 mb-5">
        <div class="container text-center">
            <h2 class="show-title text-center animate-slide-in">{{ $show->title }}</h2>

            <div class="show-description animate-slide-in-delay">
                {!! $show->description_html !!}
            </div>
        </div>
    </section>

    <section class="platforms-section py-5 text-white">
        <div class="container">
            <h2 class="mb-4 text-center">Available On</h2>

            @php
                // Use ORIGINAL brand assets (SVG/PNG) placed in public/brand/
                // e.g. public/brand/youtube.svg, public/brand/spotify.svg, etc.
                $platforms = [
                    'youtube_url' => ['name' => 'YouTube',       'logo' => 'storage/brand/youtube.svg',       'cta' => 'Watch'],
                    'rumble_url'  => ['name' => 'Rumble',        'logo' => 'storage/brand/rumble.svg',        'cta' => 'Watch'],
                    'spotify_url' => ['name' => 'Spotify',       'logo' => 'storage/brand/spotify.svg',       'cta' => 'Listen'],
                    'iheart_url'  => ['name' => 'iHeartRadio',   'logo' => 'storage/brand/iheart.svg',        'cta' => 'Listen'],
                    'amazon_url'  => ['name' => 'Amazon Music',  'logo' => 'storage/brand/amazon-music.svg',  'cta' => 'Listen'],
                    'pandora_url' => ['name' => 'Pandora',       'logo' => 'storage/brand/pandora.svg',       'cta' => 'Listen'],
                    'podbean_url' => ['name' => 'Podbean',       'logo' => 'storage/brand/podbean.svg',       'cta' => 'Listen'],
                    'applepodcast_url' => ['name' => 'Apple Podcast',       'logo' => 'storage/brand/applepodcast.svg',       'cta' => 'Listen'],

                ];
            @endphp

            <div class="platforms-list">
                @foreach($platforms as $field => $info)
                    @if(!empty($show->$field))
                        <div class="platform-item">
                            <div class="platform-left">
                                <img
                                    src="{{ asset($info['logo']) }}"
                                    alt="{{ $info['name'] }} logo"
                                    class="platform-logo"
                                    loading="lazy"
                                    decoding="async"
                                    onerror="this.onerror=null;this.src='{{ asset('brand/fallback.png') }}';"
                                >
                                <div>
                                    <h6 class="text-white mb-0">{{ $info['name'] }}</h6>
                                    <span class="platform-sub">Subscription</span>
                                </div>
                            </div>

                            <a href="{{ $show->$field }}"
                               class="btn-watch"
                               target="_blank"
                               rel="noopener"
                               aria-label="Open {{ $info['name'] }} in new tab">
                                <i class="fas fa-play-circle"></i> {{ $info['cta'] }}
                            </a>
                        </div>
                    @endif
                @endforeach
            </div>
        </div>
    </section>

    <style>
        .show-hero {
            background-size: cover;
            background-position: center;
            position: relative;
            color: #fff;
            text-align: center;
            padding: 160px 0;
            margin-top: 106px;
        }

        .show-veil {
            position: absolute;
            inset: 0;
            background: rgba(0, 0, 0, .55);
        }

        .show-hero .show-logo {
            width: 140px;
            height: auto;
            filter: drop-shadow(0 4px 10px rgba(0, 0, 0, .4));
        }

        .show-hero .show-title {
            font-size: 48px;
            font-weight: 700;
            margin-top: 20px;
        }

        .show-hero .show-tagline {
            font-size: 20px;
            opacity: .9;
        }

        .platforms-list {
            max-width: 600px;
            margin: 0 auto;
        }

        .platform-item {
            background: #111;
            padding: 15px 20px;
            margin-bottom: 12px;
            border-radius: 12px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            transition: background .2s ease, transform .2s ease;
        }
        .platform-item:hover {
            background: #161616;
            transform: translateY(-1px);
        }

        .platform-left {
            display: flex;
            align-items: center;
            gap: 16px;
        }

        /* ORIGINAL colorful logos (no color filters applied) */
        .platform-logo {
            height: 28px;
            width: auto;
            display: block;
        }
        @supports (object-fit: contain) {
            .platform-logo {
                max-height: 28px;
                object-fit: contain;
            }
        }

        .platform-sub {
            font-size: 12px;
            opacity: .75;
        }

        .btn-watch {
            border: 1px solid #fff;
            border-radius: 20px;
            padding: 6px 14px;
            color: #fff;
            text-decoration: none;
            font-weight: 600;
            font-size: 14px;
            display: inline-flex;
            align-items: center;
            gap: 6px;
        }

        .btn-watch:hover {
            background: #fff;
            color: #000;
        }

        .show-title {
            opacity: 0;
            transform: translateX(-60px);
            animation: slideInLeft 1s ease-out forwards;
        }

        @keyframes slideInLeft {
            from {
                opacity: 0;
                transform: translateX(-60px);
            }
            to {
                opacity: 1;
                transform: translateX(0);
            }
        }

        .animate-slide-in {
            opacity: 0;
            animation: slideInLeft 1s ease-out forwards;
        }

        .animate-slide-in-delay {
            opacity: 0;
            animation: slideInLeft 1s ease-out 0.3s forwards;
        }

        .show-description.animate-slide-in-delay {
            text-align: left;
        }
    </style>
@endsection
