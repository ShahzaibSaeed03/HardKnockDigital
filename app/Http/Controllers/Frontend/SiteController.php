<?php

namespace App\Http\Controllers\Frontend;
use App\Http\Controllers\Controller;

class SiteController extends Controller {
  public function home()  { return view('frontend.pages.home'); }
  public function about() { return view('frontend.pages.about'); }
  public function workWithUs() { return view('frontend.pages.workWithUs'); }
}
