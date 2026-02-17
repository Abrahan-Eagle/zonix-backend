<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function about() {
        return view('front.pages.about');
    }

    public function terms() {
        return view('front.pages.terms');
    }

    public function privacy() {
        return view('front.pages.privacy');
    }

    public function cookies() {
        return view('front.pages.cookies');
    }

    public function faq() {
        return view('front.pages.faq');
    }

    public function contact() {
        return view('front.pages.contact');
    }

    public function blog() {
        return view('front.pages.blog');
    }

    public function careers() {
        return view('front.pages.careers');
    }

    public function press() {
        return view('front.pages.press');
    }

    public function help() {
        return view('front.pages.help');
    }
}
