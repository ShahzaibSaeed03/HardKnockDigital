@extends('frontend.layouts.spapp2')
@section('title', 'About — Hard Knock Digital')

@section('content')

  {{-- Preloader --}}
  <div class="preloader">
    <div class="preloader-inner">
      <span></span><span></span><span></span><span></span>
    </div>
  </div>


  {{-- Breadcrumb --}}
  <div class="breadcumb-wrapper" style="background-color: #0a0c00;">
    <div class="container">
      <div class="breadcumb-content">
        <h1 class="breadcumb-title">About</h1>
      </div>
    </div>
  </div>

  {{-- Stats / Counter Section --}}
  {{-- <div class="counter-area-1 space overflow-hidden">
    <div class="container">
      <div class="row gy-40 align-items-center justify-content-lg-between justify-content-center">
        <div class="col-xl-auto col-lg-4 col-md-6 counter-divider">
          <div class="counter-card">
            <h3 class="counter-card_number"><span class="counter-number">26</span>+</h3>
            <h4 class="counter-card_title">Reach</h4>
            <p class="counter-card_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="col-xl-auto col-lg-4 col-md-6 counter-divider">
          <div class="counter-card">
            <h3 class="counter-card_number"><span class="counter-number">347</span>+</h3>
            <h4 class="counter-card_title">Audience</h4>
            <p class="counter-card_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
        <div class="col-xl-auto col-lg-4 col-md-6 counter-divider">
          <div class="counter-card">
            <h3 class="counter-card_number"><span class="counter-number">139</span>+</h3>
            <h4 class="counter-card_title">Engagement</h4>
            <p class="counter-card_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et dolore magna aliqua.</p>
          </div>
        </div>
      </div>
    </div>
  </div> --}}

  {{-- Why Choose Us --}}
  <div class="why-area-1 space bg-theme">
    <div class="why-img-1-1 shape-mockup wow animate__animated animate__fadeInRight" data-wow-duration="1.5s"
      data-wow-delay="0.2s" data-right="0" data-top="-100px" data-bottom="140px">
      <!--<img src="{{ asset('site/img/normal/why_3-1.jpg') }}" alt="img">-->
    </div>

    <div class="container">
      <div class="row">
        <div class="col-lg-6">
          <div class="title-area mb-45">
            <h2 class="sec-title wow animate__animated animate__slideInLeft" data-wow-delay="0.3s">
              Defining the Future of Urban Digital Media
            </h2>
          </div>

          <h4 class="wow animate__animated animate__slideInLeft" data-wow-delay="0.5s">
            We Love What We Do
          </h4>

          <p class="wow animate__animated animate__slideInLeft" data-wow-delay="0.7s">
            We are driven by the opportunity to connect with the most dynamic and engaged audience in
            media today. Our passion is the authentic creation and delivery of <b>high-impact digital content</b>
            that genuinely reflects the energy, style, and essential conversations of <b>urban culture</b>. We are
            here to amplify the voices and experiences that matter most, setting the standard for culturally
            resonant media across all digital stages.
          </p>

          {{-- <h4 class="mt-35 wow animate__animated animate__slideInLeft" data-wow-delay="0.9s">
            Why Work With Us
          </h4>

          <p class="mb-n1 wow animate__animated animate__slideInLeft" data-wow-delay="1.1s">
            Partnership with Hard Knock Digital secures more than just screen time—it <b>cultural
              relevance</b>. Our approach moves beyond transactional advertising slots. We specialize in
            building <b>strategic partnerships</b> that deliver genuine <b>cultural integration</b>, positioning your
            brand as an authentic and trusted part of the urban community. Work with us to move from
            simply reaching an audience to becoming an essential part of the culture.
          </p> --}}
        </div>
      </div>
    </div>
  </div>


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

@push('scripts')
  <script>
    // Preloader timeout
    $(window).on('load', function () {
      $('.preloader').fadeOut(500);
    });
  </script>
@endpush