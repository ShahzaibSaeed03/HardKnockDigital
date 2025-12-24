<!doctype html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
<title>@yield('title', 'Hard Knock Digital | Authentic Urban Digital Media & Conten')</title>

{{-- Meta tags --}}
<meta name="title" content="Hard Knock Digital | Authentic Urban Digital Media & Content">
<meta name="description" content="Creating the future of urban digital media. Hard Knock Digital delivers authentic, quality and exclusive content for the culture.">
<meta name="keywords" content="digital, content, media, urban, stories, lifestyle, Hard Knock Digital"> 
<meta name="author" content="Hard Knock Digital | Authentic Urban Digital Media & Content">
<meta name="robots" content="INDEX,FOLLOW">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<meta property="og:title" content="Hard Knock Digital | Authentic Urban Digital Media & Content">
<meta property="og:description" content="Authentic Media For Urban Audiences">
<meta property="og:type" content="website">
<meta property="og:url" content="{{ url()->current() }}">
{{-- <meta property="og:image" content="{{ asset('images/logo.png') }}"> --}}

  {{-- Favicons --}}
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('site/img/favicons/favicon.png') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="{{ asset('site/img/favicons/ms-icon-144x144.png') }}">
  <meta name="theme-color" content="#ffffff">

  {{-- Google Fonts --}}
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link
    href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800&family=Unbounded:wght@400;500;600;700&display=swap"
    rel="stylesheet">

  {{-- CSS --}}
  <link rel="stylesheet" href="{{ asset('site/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/all.min.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/magnific-popup.min.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/slick.min.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/animate.min.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/imageRevealHover.css') }}">
  <link rel="stylesheet" href="{{ asset('site/css/style.css') }}">
</head>

<body>
  {{-- Header --}}
  {{-- @include('frontend.partials.header') --}}

  {{-- Page content --}}
  <main>
    @yield('content')
  </main>

  {{-- Footer --}}
  @include('frontend.partials.footer')

  {{-- Scroll to top --}}
  <div class="scroll-top">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path
        d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"
        style="transition: stroke-dashoffset 10ms linear 0s;
        stroke-dasharray: 307.919, 307.919;
        stroke-dashoffset: 307.919;">
      </path>
    </svg>
  </div>

  {{-- JS Files --}}
  <script src="{{ asset('site/js/vendor/jquery-3.6.0.min.js') }}"></script>
  <script src="{{ asset('site/js/slick.min.js') }}"></script>
  <script src="{{ asset('site/js/bootstrap.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery.magnific-popup.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery.counterup.min.js') }}"></script>
  <script src="{{ asset('site/js/imagesloaded.pkgd.min.js') }}"></script>
  <script src="{{ asset('site/js/isotope.pkgd.min.js') }}"></script>
  <script src="{{ asset('site/js/gsap.min.js') }}"></script>
  <script src="{{ asset('site/js/twinmax.js') }}"></script>
  <script src="{{ asset('site/js/imageRevealHover.js') }}"></script>
  <script src="{{ asset('site/js/jarallax.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery.marquee.min.js') }}"></script>
  <script src="{{ asset('site/js/jquery-ui.min.js') }}"></script>
  <script src="{{ asset('site/js/waypoints.js') }}"></script>
  <script src="{{ asset('site/js/wow.js') }}"></script>
  <script src="{{ asset('site/js/main.js') }}"></script>

  {{-- Preloader control --}}
  <script>
    (function () {
      $(window).on('load', function () {
        $('.preloader').fadeOut(600);
      });
      // Safety fallback
      setTimeout(function () {
        const p = document.querySelector('.preloader');
        if (p) p.style.display = 'none';
      }, 3000);
    })();
  </script>

  {{-- Extra per-page scripts --}}
  @stack('scripts')
</body>
</html>
