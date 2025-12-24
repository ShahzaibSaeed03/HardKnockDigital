<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">

<footer class="footer-wrapper footer-layout2 bg-white overflow-hidden">
  <div class="container">
    <div class="widget-area space-top">
      <div class="row justify-content-between">

        {{-- Newsletter --}}
        <div class="col-md-6 col-xl-5 col-lg-6">
          <div class="widget widget-newsletter footer-widget">
            <h3 class="widget_title">
              Sign Up for Updates and Stay Ahead
            </h3>

            {{-- Newsletter Form --}}
            <form id="newsletter-form" class="newsletter-form" action="{{ route('newsletter.subscribe') }}"
              method="POST" novalidate>
              @csrf

              {{-- Hidden anti-spam field --}}
              <input type="text" name="company_website" tabindex="-1" autocomplete="off" class="d-none"
                aria-hidden="true">

              {{-- Email field --}}
              <div class="form-group">
                <label for="newsletter_email" class="visually-hidden">Email address</label>
                <input id="newsletter_email" name="email" class="form-control" type="email" inputmode="email"
                  placeholder="Your email here" autocomplete="email" required aria-required="true">
                @error('email')
                  <small class="text-danger d-block mt-1">{{ $message }}</small>
                @enderror
              </div>

              {{-- Submit button --}}
              <button type="submit" class="btn btn-primary d-flex align-items-center gap-2 px-3 py-2">
                <span>Subscribe</span>
                <img src="{{ asset('site/img/icon/arrow-left-top.svg') }}" alt="Send" style="width:18px; height:18px;">
              </button>
            </form>

            {{-- Flash success/error messages --}}
            @if (session('newsletter_success'))
              <small class="text-success d-block mt-2">{{ session('newsletter_success') }}</small>
            @endif
            @if (session('newsletter_error'))
              <small class="text-danger d-block mt-2">{{ session('newsletter_error') }}</small>
            @endif

            <p class="mt-2">
              By signing up, you agree to receive occasional emails from Hard Knock Digital.
              We treat your information responsibly.
            </p>
          </div>
        </div>

        {{-- Links --}}
        <div class="col-md-3 col-xl-2 col-lg-3">
          <div class="widget widget_nav_menu footer-widget">
            <h3 class="widget_title">Links</h3>
            <div class="menu-all-pages-container list-column2">
              <ul class="menu">
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('announcements.list') }}">Announcements</a></li>
                <li><a href="{{ route('news.list') }}">News</a></li>
              </ul>
            </div>
          </div>
        </div>

        {{-- Contact --}}
        <div class=" col-md-6 col-xl-auto col-lg-4">
                    <div class="widget footer-widget widget-contact">
                      <h3 class="widget_title">Contact</h3>
                      <!--<ul class="contact-info-list">-->
                      <!--  <li>12345 HKN, 12345<br>PORTFOLIO ADDRESS</li>-->
                <li class="d-flex flex-column">
                  <a href="tel:+(312) 234 7893" style="color: black !important;">(312) 234 7893</a>
                  <a href="mailto:info@hardknockdigital.com"
                    style="color: black !important;">info@hardknockdigital.com</a>
                </li>
              </ul>
            </div>
          </div>

        </div>
      </div>
    </div>

    <div class="container-fluid text-center">
      <div class="copyright-wrap">
        <div class="row gy-3 justify-content-between align-items-center">
          <div class="col-md-6 col-sm-12">
            <img src="{{ asset('site/img/logo-black.svg') }}" alt="Hard Knock Digital" class="me-2"
              style="height:50px;">
          </div>
          <div class="col-md-6 align-self-center">
            <div class="social-btn style3 justify-content-center">
              <a href="https://www.facebook.com/share/1H8jw9m7m2/" target="_blank" rel="noopener">
                <span class="link-effect">
                  <span class="effect-1"><i class="fab fa-facebook"></i></span>
                  <span class="effect-1"><i class="fab fa-facebook"></i></span>
                </span>
              </a>
              <a href="https://www.instagram.com/hardknockdigital?igsh=MTF4NjdydGlkd2o3MA==" target="_blank"
                rel="noopener">
                <span class="link-effect">
                  <span class="effect-1"><i class="fab fa-instagram"></i></span>
                  <span class="effect-1"><i class="fab fa-instagram"></i></span>
                </span>
              </a>
              <a href="https://x.com/knock_hard?t=vLxUtC_n9HRPF7Qv5VWPCQ&s=09" target="_blank" rel="noopener">
                <span class="link-effect">
                  <span class="effect-1"><i class="fa-brands fa-x-twitter"></i></span>
                  <span class="effect-1"><i class="fa-brands fa-x-twitter"></i></span>
                </span>
              </a>
              <a href="https://www.linkedin.com/" target="_blank" rel="noopener">
                <span class="link-effect">
                  <span class="effect-1"><i class="fab fa-linkedin-in"></i></span>
                  <span class="effect-1"><i class="fab fa-linkedin-in"></i></span>
                </span>
              </a>
            </div>
          </div>
        </div>

        <div class="row gy-3 justify-content-between align-items-center mt-3">
          <div class="col-md-6">
            <p class="copyright-text mb-0">
              Copyright © {{ now()->year }}
              <a href="{{ route('home') }}">Hard Knock Digital</a>
          </p>
        </div>
        <div class=" col-md-6 align-self-center">
                <nav class="social-btn style3 justify-content-center" aria-label="Footer navigation">
                  <a href="{{ route('about') }}">
                    <span class="link-effect"><span class="effect-1">About</span><span
                      class="effect-1">About</span></span>
                  </a>
                  <a href="{{ route('news.list') }}">
                    <span class="link-effect"><span class="effect-1">News</span><span
                      class="effect-1">News</span></span>
                  </a>
                  <a href="{{ route('announcements.list') }}">
                    <span class="link-effect"><span class="effect-1">Announcements</span><span
                      class="effect-1">Announcements</span></span>
                  </a>
                </nav>
          </div>
        </div>

      </div>
    </div>
</footer>