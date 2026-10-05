@extends('emails.layout')
@section('content')
<h1 style="margin:0 0 10px;font-size:28px">Appointment received</h1>
<p style="line-height:1.7;color:#59697e">Hi {{ $appointment->patient_name }}, your appointment request has been received.</p>
<div style="margin:24px 0;padding:18px;border:1px solid #e5eaf1;border-radius:14px"><b>Doctor:</b> {{ $appointment->doctor->name }}<br><b>Date:</b> {{ $appointment->appointment_date->format('d M Y') }}<br><b>Time:</b> {{ substr($appointment->appointment_time,0,5) }}<br><b>Status:</b> {{ ucfirst($appointment->status) }}</div>
<p style="line-height:1.7;color:#59697e">Please sign in to your dashboard for future updates. Your account access is protected by a secure password setup link if this is your first appointment.</p>
<p><a href="{{ route('dashboard') }}" style="display:inline-block;background:#1f83fb;color:#fff;text-decoration:none;padding:14px 22px;border-radius:10px;font-weight:700">Open Dashboard</a></p>
@endsection
