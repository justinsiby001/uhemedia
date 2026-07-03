<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Landing Page route
Route::get('/', function () {
    return view('home');
});

// Contact Form submission endpoint
Route::post('/contact', function (Request $request) {
    // Perform standard Laravel validation on inputs
    $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:50',
        'company' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    // NOTE: This endpoint is prepared for Google Sheets integration.
    // In production, you would trigger a webhook or use a Google Sheets API client here.

    // Return back to the landing page with a success status
    return back()->with('success', 'Thank you! Your message has been sent successfully. We will get in touch soon.');
})->name('contact.submit');
