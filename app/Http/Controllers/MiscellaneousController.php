<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MiscellaneousController extends Controller
{
    public function index() {
        return view('index');
    }

    public function location() {
        return view('location.index');
    }

    public function cookiesPolicy()
    {
        return view('cookies.policy');
    }

    public function cookiesSettings()
    {
        return view('cookies.settings');
    }

    public function privacyPolicy()
    {
        return view('privacity.policy');
    }

    public function terms()
    {
        return view('privacity.terms');
    }


}
