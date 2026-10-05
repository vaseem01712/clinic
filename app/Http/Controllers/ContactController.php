<?php
namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Models\ContactMessage;

class ContactController extends Controller
{
    public function index() { return view('contact'); }

    public function store(ContactRequest $request)
    {
        ContactMessage::create($request->validated());

        return back()->with('success', 'Aapka message mil gaya hai, hum jald contact karenge.');
    }
}
