<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
class PageController extends Controller
{
    public function index():View{
        return view('pages.dashboard.about');
    }

    public function contact():View{
        return view('pages.dashboard.contact');
    }
}
