<?php
namespace App\Http\Controllers;

use App\Models\Specialty;

class SpecialtyController extends Controller
{
    public function index()
    {
        return view('specialties.index', ['specialties' => Specialty::where('is_active', true)->paginate(12)]);
    }

    public function show(Specialty $specialty)
    {
        $specialty->load(['doctors' => fn ($q) => $q->where('is_active', true), 'services']);

        return view('specialties.show', compact('specialty'));
    }
}
