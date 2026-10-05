<?php
namespace App\Http\Controllers;

use App\Models\Doctor;
use App\Models\Specialty;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index(Request $request)
    {
        $doctors = Doctor::with('specialty')
            ->where('is_active', true)
            ->when($request->name, fn ($q, $v) => $q->where('name', 'like', "%{$v}%"))
            ->when($request->specialty, fn ($q, $v) => $q->whereHas('specialty', fn ($sq) => $sq->where('slug', $v)))
            ->when($request->location, fn ($q, $v) => $q->where('location', 'like', "%{$v}%"))
            ->orderByDesc('rating')
            ->paginate(9)
            ->withQueryString();

        return view('doctors.index', [
            'doctors' => $doctors,
            'specialties' => Specialty::where('is_active', true)->get(),
        ]);
    }

    public function show(Doctor $doctor)
    {
        $doctor->load(['specialty', 'availabilities']);

        $related = Doctor::where('specialty_id', $doctor->specialty_id)
            ->where('id', '!=', $doctor->id)
            ->take(3)
            ->get();

        return view('doctors.show', compact('doctor', 'related'));
    }

    /** AJAX: available slots for a doctor on a given date */
    public function slots(Doctor $doctor, Request $request)
    {
        $date = $request->query('date', now()->toDateString());
        $weekday = \Carbon\Carbon::parse($date)->dayOfWeek;

        $availability = $doctor->availabilities()
            ->where('weekday', $weekday)
            ->where('is_active', true)
            ->first();

        if (! $availability) {
            return response()->json(['slots' => []]);
        }

        return response()->json(['slots' => $availability->generateSlots($date)]);
    }
}
