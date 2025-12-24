<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
<footer class="footer-wrapper footer-layout2 bg-white overflow-hidden">

  <div class="container-fluid text-center">
    <div class="copyright-wrap">
      <div class="row gy-3 justify-content-between align-items-center">
        <div class="col-md-6 col-sm-12">
          <img src="{{ asset('site/img/logo-black.svg') }}" alt="Hard Knock Digital" class="me-2" style="height:50px;">
        </div>
        <div class="col-md-6 align-self-center">
          <div class="social-btn style3 justify-content-center">
            <a href="https://www.facebook.com/share/1H8jw9m7m2/" target="_blank" rel="noopener">
              <span class="link-effect">
                <span class="effect-1"><i class="fab fa-facebook"></i></span>
                <span class="effect-1"><i class="fab fa-facebook"></i></span>
              </span>
            </a>
            <a href="https://www.instagram.com/hardknockdigital?igsh=MTF4NjdydGlkd2o3MA==" target="_blank" rel="noopener">
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
        <div class="col-md-6 align-self-center">
          <nav class="social-btn style3 justify-content-center" aria-label="Footer navigation">
            <a href="{{ route('about') }}">
              <span class="link-effect"><span class="effect-1">About</span><span class="effect-1">About</span></span>
            </a>
            <a href="{{ route('news.list') }}">
              <span class="link-effect"><span class="effect-1">News</span><span class="effect-1">News</span></span>
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