<?php
namespace App\Http\Controllers;

use App\Http\Requests\NewsletterRequest;
use App\Models\NewsletterSubscriber;

class NewsletterController extends Controller
{
    public function store(NewsletterRequest $request)
    {
        NewsletterSubscriber::create($request->validated());

        return back()->with('success', 'Subscribe ho gaya! Thank you.');
    }
}
