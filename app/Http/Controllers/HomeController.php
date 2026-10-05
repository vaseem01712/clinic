<?php
namespace App\Http\Controllers;

use App\Models\BlogPost;
use App\Models\Doctor;
use App\Models\Faq;
use App\Models\Service;
use App\Models\Specialty;
use App\Models\Testimonial;

class HomeController extends Controller
{
    public function index()
    {
        return view('home', [
            'specialties' => Specialty::where('is_active', true)->take(8)->get(),
            'doctors' => Doctor::with('specialty')->where('is_active', true)->take(3)->get(),
            'services' => Service::where('is_active', true)->take(6)->get(),
            'testimonials' => Testimonial::where('is_active', true)->take(6)->get(),
            'posts' => BlogPost::with('category')->where('is_published', true)->latest('published_at')->take(3)->get(),
            'faqs' => Faq::where('is_active', true)->orderBy('sort_order')->take(5)->get(),
        ]);
    }
}
