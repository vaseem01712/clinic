<?php
namespace App\Http\Controllers;

use App\Models\Notification;
use Illuminate\Http\Request;

class PatientPortalController extends Controller
{
    public function reports()
    {
        abort_unless(auth()->user()->isPatient(),403);
        $reports=auth()->user()->reports()->with('doctor')->latest('report_date')->paginate(12);
        return view('patient.reports',compact('reports'));
    }

    public function notifications()
    {
        abort_unless(auth()->user()->isPatient(),403);
        $notifications=auth()->user()->notifications()->paginate(20);
        return view('patient.notifications',compact('notifications'));
    }

    public function readNotification(Notification $notification)
    {
        abort_unless(auth()->user()->isPatient(),403);
        abort_unless($notification->user_id===auth()->id(),403);
        $notification->update(['read_at'=>now()]);
        return $notification->action_url ? redirect($notification->action_url) : back();
    }
}
