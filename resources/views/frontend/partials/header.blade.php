<style>
  #link-effect-spc {
    color: white;
  }

  button.menu-toggle.sidebar-btn {
    background-color: white;
  }
</style>
<header class="nav-header header-layout3" style="background-color: #0a0c00;">
  <div class="sticky-wrapper" style="background-color: #0a0c00;">
    <div class="menu-area">
      <div class="container-fluid">
        <div class="row align-items-center justify-content-between">
          <div class="col-auto">
            <div class="header-logo">
              <a href="{{ route('home') }}"><img src="{{ asset('site/img/white-logo-sm.svg') }}" alt="logo"></a>
            </div>
          </div>
          <div class="col-auto ms-auto">
            <nav class="main-menu d-none d-lg-inline-block">
              <ul>
                <li><a href="{{ route('home') }}"><span class="link-effect" id="link-effect-spc"><span
                        class="effect-1">HOME</span><span class="effect-1">HOME</span></span></a></li>
                <li><a href="{{ route('about') }}">
                    <span class="link-effect" id="link-effect-spc"><span class="effect-1">ABOUT US</span><span
                        class="effect-1">ABOUT
                        US</span></span>
                  </a></li>
                <li class="menu-item-has-children">
                  <a href="#">
                    <span class="link-effect" id="link-effect-spc">
                      <span class="effect-1">NEWS</span>
                      <span class="effect-1">NEWS</span>
                    </span>
                  </a>
                  <ul class="sub-menu">
                    <li><a href="{{ route('news.list') }}">Press Releases</a></li>
                    <li><a href="{{ route('announcements.list') }}">Announcements</a></li>
                  </ul>
                </li>
                <li><a href="{{ route('shows.list') }}">
                    <span class="link-effect" id="link-effect-spc"><span class="effect-1">OUR CONTENT</span><span
                        class="effect-1">OUR
                        CONTENT</span></span>
                  </a></li>

                <li><a href="{{ route('work.with.us') }}">
                    <span class="link-effect" id="link-effect-spc"><span class="effect-1">WORK WITH US</span><span
                        class="effect-1">WORK WITH
                        US</span></span>
                  </a></li>
                {{-- <li><a href="{{ route('announcements.list') }}">
                <span class="link-effect" id="link-effect-spc"><span class="effect-1">ANNOUNCEMENTS</span><span
                    class="effect-1">ANNOUNCEMENTS</span></span>
                </a></li> --}}
              </ul>
            </nav>
            <div class="navbar-right d-inline-flex d-lg-none">
              <button type="button" class="menu-toggle sidebar-btn"><span class="line"></span><span
                  class="line"></span><span class="line"></span></button>
            </div>
          </div>
          <div class="col-auto d-none d-lg-block">
            <div class="header-button">
              <a href="mailto:info@hardknockdigital.com" class="btn" style="background-color: white;">
                <span class="link-effect" id="link-effect-spc" style="color: #0a0c00;"><span class="effect-1">CONTACT
                    US</span><span class="effect-1">CONTACT
                    US</span></span>
              </a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</header>

<div class="mobile-menu-wrapper">
  <div class="mobile-menu-area">
    <button class="menu-toggle"><i class="fas fa-times"></i></button>
    <div class="mobile-logo">
      <a href="{{ route('home') }}"><img src="{{ asset('site/img/logo.svg') }}" alt="HKN"></a>
    </div>
    <div class="mobile-menu">
      <ul>
        <li><a href="{{ route('home') }}">Home</a></li>
        <li><a href="{{ route('about') }}">About Us</a></li>
        <li class="menu-item-has-children">
          <a href="#">News</a>
          <ul class="sub-menu">

            <li><a href="{{ route('news.list') }}">Press Releases</a></li>
            <li><a href="{{ route('announcements.list') }}">Announcements</a></li>
          </ul>
        </li>
        <li><a href="{{ route('shows.list') }}">Our Content</a></li>
        <li><a href="{{ route('work.with.us') }}">Work With Us</a></li>
        {{-- <li><a href="{{ route('announcements.list') }}">Announcements</a></li> --}}
      </ul>
    </div>
    <!--<div class="sidebar-wrap">-->
    <!--    <h6>12345 HKN, 12345,</h6>-->
    <!--    <h6>PORTFOLIO ADDRESS</h6>-->
    <!--</div>-->
    <!--<div class="sidebar-wrap">-->
    <!--    <h6><a href="tel:1234123654987">+1 234 123 654 987</a></h6>-->
    <!--    <h6><a href="mailto:info@hardknockdigital.com">info@hardknockdigital.com</a></h6>-->
    <!--</div>-->

    <div class="social-btn style3">
      <a href="https://www.facebook.com/share/1H8jw9m7m2/">
        <span class="link-effect"><span class="effect-1"><i class="fab fa-facebook"></i></span><span class="effect-1"><i
              class="fab fa-facebook"></i></span></span>
      </a>
      <a href="https://www.instagram.com/hardknockdigital?igsh=MTF4NjdydGlkd2o3MA==">
        <span class="link-effect"><span class="effect-1"><i class="fab fa-instagram"></i></span><span
            class="effect-1"><i class="fab fa-instagram"></i></span></span>
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