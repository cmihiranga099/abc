<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
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

    public function submitContact(Request $request)
    {
        $validated = $request->validate([
            'name' => ['required', 'string', 'max:100'],
            'email' => ['required', 'email', 'max:150'],
            'phone' => ['required', 'string', 'max:30'],
            'event_date' => ['required', 'date'],
            'event_type' => ['required', 'in:wedding,corporate,birthday,anniversary,conference,other'],
            'message' => ['required', 'string', 'max:2000'],
            'guest_count' => ['nullable', 'integer', 'min:1'],
            'terms' => ['accepted'],
        ]);

        $validated['terms'] = $request->boolean('terms');
        ContactMessage::create($validated);

        return back()->with('success', 'Thanks for reaching out! We will contact you within 24 hours.');
    }
}
