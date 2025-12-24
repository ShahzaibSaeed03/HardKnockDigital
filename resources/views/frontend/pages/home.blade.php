@extends('frontend.layouts.spapp')
@section('title', 'Hard Knock Digital')

@section('content')
    <div class="preloader">
        <div class="preloader-inner">
            <span></span><span></span><span></span><span></span>
        </div>
    </div>

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
            <!--    <h6>                <a href="mailto:info@hardknockdigital.com">info@hardknockdigital.com</a></h6>-->
            <!--</div>-->

            <div class="social-btn style3">
                <a href="https://www.facebook.com/share/1H8jw9m7m2/">
                    <span class="link-effect"><span class="effect-1"><i class="fab fa-facebook"></i></span><span
                            class="effect-1"><i class="fab fa-facebook"></i></span></span>
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

    <header class="nav-header header-layout2">
        <div class="sticky-wrapper">
            <div class="menu-area">
                <div class="container-fluid">
                    <div class="row align-items-center justify-content-between">
                        <div class="col-auto">
                            <div class="header-logo">
                                <a href="{{ route('home') }}"><img src="{{ asset('site/img/white-logo-sm.svg') }}"
                                        alt="logo"></a>
                            </div>
                        </div>
                        <div class="col-auto ms-auto">
                            <nav class="main-menu d-none d-lg-inline-block">
                                <ul>
                                    <li><a href="{{ route('home') }}">
                                            <span class="link-effect"><span class="effect-1">HOME</span><span
                                                    class="effect-1">HOME</span></span>
                                        </a></li>
                                    <li><a href="{{ route('about') }}">
                                            <span class="link-effect"><span class="effect-1">ABOUT US</span><span
                                                    class="effect-1">ABOUT US</span></span>
                                        </a></li>
                                    <li class="menu-item-has-children">
                                        <a href="#">
                                            <span class="link-effect">
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
                                            <span class="link-effect"><span class="effect-1">OUR CONTENT</span><span
                                                    class="effect-1">OUR CONTENT</span></span>
                                        </a></li>

                                    <li><a href="{{ route('work.with.us') }}">
                                            <span class="link-effect"><span class="effect-1">WORK WITH US</span><span
                                                    class="effect-1">WORK WITH US</span></span>
                                        </a></li>
                                    {{-- <li><a href="{{ route('announcements.list') }}">
                                            <span class="link-effect"><span class="effect-1">ANNOUNCEMENTS</span><span
                                                    class="effect-1">ANNOUNCEMENTS</span></span>
                                        </a></li> --}}

                                </ul>
                            </nav>
                            <div class="navbar-right d-inline-flex d-lg-none">
                                <button type="button" class="menu-toggle sidebar-btn"><span class="line"></span><span
                                        class="line"></span><span class="line"></span></button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    {{-- Hero --}}
    <div class="hero-wrapper hero-2" id="hero">
        <div class="container">
            <div class="hero-style2">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="hero-title wow img-custom-anim-right text-white">Crafting</h1>
                        <h1 class="hero-title wow img-custom-anim-left text-white">Culture-Driven</h1>
                    </div>
                    <div class="col-lg-10 offset-lg-2">
                        <h1 class="hero-title wow img-custom-anim-right text-white">Media.</h1>
                    </div>
                    <div class="col-xxl-4 col-xl-5 col-lg-6">
                        <p class="hero-text wow img-custom-anim-left text-white">Hard Knock Digital is a digital media
                            company that delivers authentic, high-impact content, serving as the definitive cultural hub for
                            the dynamic urban audience.</p>
                        <div class="btn-group fade_left">
                            <a href="{{ route('about') }}" class="btn style2 wow img-custom-anim-left">
                                <span class="link-effect"><span class="effect-1">KNOW ABOUT US</span><span
                                        class="effect-1">KNOW ABOUT US</span></span>
                            </a>
                        </div>
                    </div>
                </div>
                <!--<div class="row justify-content-end">-->
                <!--    <div class="col-xxl-6 col-xl-7 col-lg-9">-->
                <!--        <div class="wow img-custom-anim-right">-->
                <!--            <div class="hero-contact-wrap">12345 HKN, 12345 PORTFOLIO ADDRESS</div>-->
                <!--            <div class="hero-contact-wrap">-->
                <!--                <a href="tel:1234123654987">+1 234 123 654 987</a>-->
                <!--                                <a href="mailto:info@hardknockdigital.com">info@hardknockdigital.com</a>-->
                <!--            </div>-->
                <!--        </div>-->
                <!--    </div>-->
                <!--</div>-->
            </div>
        </div>
    </div>

    {{-- Marquee --}}
    <div class="container-fluid p-0 overflow-hidden">
        <div class="slider__marquee clearfix marquee-wrap">
            <div class="marquee_mode marquee__group">
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> News • Announcements — Stay Up to
                        date on Hard Knock Digital Latest News & Announcements</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Digital Content That Shapes Urban
                        Culture</a></h6>
                <h6 class="item m-item"><a href="#"><i class="fas fa-star-of-life"></i> Culture Over Clicks</a></h6>
            </div>
        </div>
    </div>

    {{-- Feature (News card) --}}
    <div class="feature-area-1 space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-6 col-lg-8">
                    <div class="title-area text-center">
                        <h2 class="sec-title">News and Announcements</h2>
                    </div>
                </div>
            </div>
            <div class="row gy-4 align-items-center justify-content-center">
                <div class="col-xxl-5 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <img src="{{ asset('site/img/icon/feature-icon1-1.svg') }}" alt="icon">
                        </div>
                        <h4 class="feature-card-title"><a href="{{ route('news.list') }}">News</a></h4>
                        <p class="feature-card-text">Stay up to date with latest news and press releases.</p>
                        <a href="{{ route('news.list') }}" class="btn ">
                            <span class="link-effect">
                                <span class="effect-1">VIEW NEWS</span>
                                <span class="effect-1">VIEW NEWS</span>
                                <img src="{{ asset('site/img/icon/arrow-left-top.svg') }}" alt="icon">
                            </span>
                        </a>

                    </div>
                </div>


                <div class="col-xxl-5 col-md-6">
                    <div class="feature-card">
                        <div class="feature-card-icon">
                            <img src="{{ asset('site/img/icon/feature-icon1-2.svg') }}" alt="icon">
                        </div>
                        <h4 class="feature-card-title"><a href="{{ route('announcements.list') }}">Announcements</a></h4>
                        <p class="feature-card-text">Official notices on premieres, events, and casting calls.</p>
                        <a href="{{ route('announcements.list') }}" class="btn ">
                            <span class="link-effect">
                                <span class="effect-1">VIEW ANNOUNCEMENTS</span>
                                <span class="effect-1">VIEW ANNOUNCEMENTS</span>
                                <img src="{{ asset('site/img/icon/arrow-left-top.svg') }}" alt="icon">
                            </span>
                        </a>

                    </div>
                </div>

            </div>
        </div>
    </div>

    {{-- CTA --}}
    <div class="cta-area-1 overflow-hidden bg-theme space">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-xl-8 col-lg-10">
                    <div class="title-area text-center mb-0">
                        <h2 class="sec-title">Let's Connect</h2>
                        <p class="sec-text mt-30 mb-40">Reach real audiences with placements that perform.</p>
                        <div class="btn-group justify-content-center">
                            <a href="mailto:info@hardknockdigital.com" class="btn mt-0" aria-label="Email HKN">
                                <span class="link-effect"><span class="effect-1">LET’S TALK WITH US</span><span
                                        class="effect-1">LET’S TALK WITH US</span></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection