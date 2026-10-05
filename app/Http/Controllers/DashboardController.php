<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        $user = Auth::user();

        if (!$user) {
            return redirect()->route('login');
        }

        // Doctor -> Doctor Dashboard
        if (method_exists($user, 'isDoctor') && $user->isDoctor()) {
            return redirect()->route('doctor.dashboard');
        }

        /*
         * Do NOT block the user with isPatient().
         *
         * The authenticated non-doctor user is treated as a patient
         * dashboard user. This keeps the existing patient portal working
         * even if the User model does not currently have isPatient().
         */

        $appointments = $user->appointments()
            ->with(['doctor.specialty', 'service'])
            ->latest('appointment_date')
            ->latest('appointment_time')
            ->get();

        $today = now()->toDateString();

        $upcoming = $appointments->filter(function ($appointment) use ($today) {
            if (!$appointment->appointment_date) {
                return false;
            }

            $date = $appointment->appointment_date instanceof \Carbon\CarbonInterface
                ? $appointment->appointment_date->format('Y-m-d')
                : date('Y-m-d', strtotime($appointment->appointment_date));

            return $date >= $today && $appointment->status !== 'cancelled';
        });

        $past = $appointments->filter(function ($appointment) use ($today) {
            if (!$appointment->appointment_date) {
                return false;
            }

            $date = $appointment->appointment_date instanceof \Carbon\CarbonInterface
                ? $appointment->appointment_date->format('Y-m-d')
                : date('Y-m-d', strtotime($appointment->appointment_date));

            return $date < $today;
        });

        $notifications = $user->notifications()
            ->latest()
            ->take(5)
            ->get();

        $unreadCount = $user->notifications()
            ->whereNull('read_at')
            ->count();

        $reports = $user->reports()
            ->with('doctor')
            ->latest('report_date')
            ->take(4)
            ->get();

        $medicalRecords = $user->medicalRecords()
            ->with('doctor')
            ->whereNotNull('patient_visible_notes')
            ->latest()
            ->take(4)
            ->get();

        $nextAppointment = $upcoming
            ->sortBy(function ($appointment) {
                $date = $appointment->appointment_date;

                if ($date instanceof \Carbon\CarbonInterface) {
                    $date = $date->format('Y-m-d');
                } else {
                    $date = date('Y-m-d', strtotime($date));
                }

                return $date . ' ' . ($appointment->appointment_time ?? '');
            })
            ->first();

        return view('dashboard.index', [
            'upcoming' => $upcoming,
            'past' => $past,
            'totalAppointments' => $appointments->count(),
            'reportCount' => $user->reports()->count(),
            'notifications' => $notifications,
            'unreadCount' => $unreadCount,
            'nextAppointment' => $nextAppointment,
            'reports' => $reports,
            'medicalRecords' => $medicalRecords,
        ]);
    }
}