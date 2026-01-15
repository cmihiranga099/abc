<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function home()
    {
        return view('pages.home');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function packages()
    {
        return view('pages.packages');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function customize(Request $request)
    {
        return view('pages.customize', [
            'service' => $request->query('service'),
        ]);
    }

    public function reviews()
    {
        return view('pages.reviews');
    }

    public function contact()
    {
        return view('pages.contact');
    }
}
