<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AristController extends Controller
{
    public function arist(Request $request) {
        return view('arist');
    }
}
