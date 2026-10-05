<?php
namespace App\Http\Controllers;

use App\Models\Service;

class ServiceController extends Controller
{
    public function index()
    {
        return view('services.index', ['services' => Service::where('is_active', true)->paginate(9)]);
    }

    public function show(Service $service)
    {
        $related = Service::where('specialty_id', $service->specialty_id)
            ->where('id', '!=', $service->id)->take(3)->get();

        return view('services.show', compact('service', 'related'));
    }
}
