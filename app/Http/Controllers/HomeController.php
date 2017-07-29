<?php

namespace Linkzone\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function getHome()
    {
        if (Auth::check()) return redirect()->route('getFeed');

        return view('home');
    }
}
