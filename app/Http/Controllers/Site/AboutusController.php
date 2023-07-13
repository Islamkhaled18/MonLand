<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use App\Models\Aboutus;
use Illuminate\Http\Request;

class AboutusController extends Controller
{
    public function index()
    {
        $about_us = Aboutus::get();

        return view('site.about_us.index',compact('about_us'));
    }
}
