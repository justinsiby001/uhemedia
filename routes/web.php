<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

// Landing Page route
Route::get('/', function () {
    return view('home');
});

use Illuminate\Support\Facades\Http;

// Contact Form submission endpoint
Route::post('/contact', function (Request $request) {
    // Perform standard Laravel validation on inputs
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'email' => 'required|email|max:255',
        'phone' => 'required|string|max:50',
        'company' => 'nullable|string|max:255',
        'message' => 'required|string',
    ]);

    // Send payload to Google Sheets Webhook if configured in .env
    $webhookUrl = env('GOOGLE_SHEETS_WEBHOOK_URL');
    if ($webhookUrl) {
        try {
            Http::timeout(5)->post($webhookUrl, [
                'date' => now()->toDateTimeString(),
                'name' => $validated['name'],
                'email' => $validated['email'],
                'phone' => $validated['phone'],
                'company' => $validated['company'] ?? '',
                'message' => $validated['message'],
            ]);
        } catch (\Exception $e) {
            // Log warning but do not crash the user redirection
            logger()->warning('Google Sheets submission failed: ' . $e->getMessage());
        }
    }

    $successMessage = 'Thank you! Your message has been sent successfully. We will get in touch soon.';

    if ($request->ajax()) {
        return response()->json([
            'success' => true,
            'message' => $successMessage
        ]);
    }

    // Return back to the landing page with a success status
    return back()->with('success', $successMessage);
})->name('contact.submit');
