<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index(Request $request) {
        return view('index');
    }

    public function detail(Request $request, $id) {
        return view('detail');
    }

    public function contactUs(Request $request) {
        return view('contact-us');
    }

    public function aboutUs(Request $request) {
        return view('about-us');
    }
}
