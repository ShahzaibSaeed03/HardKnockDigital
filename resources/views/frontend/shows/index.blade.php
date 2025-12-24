@extends('frontend.layouts.spapp2')
@section('title', 'Shows')

@section('content')
    <div class="breadcumb-wrapper" style="background-color: black;">
        <div class="container">
            <div class="breadcumb-content">
                <h1 class="breadcumb-title">Our Content</h1>
            </div>
        </div>
    </div>

    <section class="shows-grid space-top space-bottom">
  <div class="container">
    <div class="row g-4">
      @forelse($shows as $show)
        <div class="col-12 col-sm-6 col-lg-3">
          <a href="{{ route('shows.show', $show->slug) }}" class="show-card">
            <div class="show-banner"
                style="background-image:url('{{ asset('storage/' . $show->banner_image) }}')">
              <div class="show-overlay">
                <h3 class="show-title">{{ $show->title }}</h3>
                <div class="show-arrow">
                  <i class="fas fa-arrow-right"></i>
                </div>
              </div>
            </div>
          </a>
        </div>
      @empty
        <div class="col-12 text-center py-5">
          <p>No shows found.</p>
        </div>
      @endforelse
    </div>
  </div>
</section>

<style>
  .show-card {
    display: block;
    overflow: hidden;
    border-radius: 10px;
    transition: transform .3s ease, box-shadow .3s ease;
  }

  .show-card:hover {
    transform: translateY(-6px);
    box-shadow: 0 8px 24px rgba(0, 0, 0, 0.3);
  }

  .show-banner {
    position: relative;
    background-size: cover;
    background-position: center;
    aspect-ratio: 6 / 4; /* vertical rectangular shape */
    border-radius: 10px;
    overflow: hidden;
  }

  .show-overlay {
    position: absolute;
    inset: 0;
    background: rgba(0, 0, 0, 0.5);
    opacity: 0;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    transition: opacity .3s ease;
    text-align: center;
    color: #fff;
  }

  .show-card:hover .show-overlay {
    opacity: 1;
  }

  .show-title {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
    color: #fff;
    text-transform: uppercase;
    letter-spacing: 0.5px;
  }

  .show-arrow {
    font-size: 1.4rem;
    color: #fff;
    transition: transform .3s ease;
  }

  .show-card:hover .show-arrow {
    transform: translateX(6px);
  }

  @media (max-width: 576px) {
    .show-title {
      font-size: 1rem;
    }
  }
</style>


    {{-- <section class="shows-grid space-top space-bottom">
        <div class="container">
            <div class="row g-4">
                @forelse($shows as $show)
                    <div class="col-12 col-sm-6 col-lg-3">
                        <a href="{{ route('shows.show', $show->slug) }}" class="show-card">
                            <div class="show-banner"
                                style="background-image:url('{{ asset('storage/' . $show->banner_image) }}')">
                                <div class="show-overlay">
                                    @if($show->logo)
                                        <img src="{{ asset('storage/' . $show->logo) }}" alt="{{ $show->title }}" class="show-logo">
                                    @endif
                                    <div class="show-arrow">
                                        <i class="fas fa-arrow-right"></i>
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                @empty
                    <div class="col-12 text-center py-5">
                        <p>No shows found.</p>
                    </div>
                @endforelse
            </div>
        </div>
    </section> --}}

    {{-- <style>
        .show-card {
            display: block;
            border-radius: 12px;
            overflow: hidden;
            transition: transform .3s ease;
        }

        .show-card:hover {
            transform: translateY(-5px);
        }

        .show-banner {
            position: relative;
            width: 100%;
            padding-top: 125%;
            background-size: cover;
            background-position: center;
            border-radius: 12px;
        }

        .show-overlay {
            position: absolute;
            inset: 0;
            background: linear-gradient(to top, rgba(0, 0, 0, .6), rgba(0, 0, 0, .1));
            display: flex;
            align-items: flex-end;
            justify-content: space-between;
            padding: 16px;
        }

        .show-logo {
            position: relative;
            left: -10px;
            bottom: -5px;
            width: 150px;
        }

        .show-arrow {
            width: 38px;
            height: 38px;
            /* border: 2px solid #fff;
            border-radius: 50%; */
            display: flex;
            align-items: center;
            justify-content: center;
            color: #fff;
            font-size: 16px;
        }

        .show-card:hover .show-arrow {
            background: rgba(255, 255, 255, .2);
        }
    </style>
@endsection --}}