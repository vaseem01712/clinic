@extends('emails.layout')
@section('content')
<h1 style="margin:0 0 10px;font-size:28px">New appointment request</h1>
<p style="line-height:1.7;color:#59697e">A new patient appointment request has been added to your MediCare schedule.</p>
<div style="margin:24px 0;padding:18px;border:1px solid #e5eaf1;border-radius:14px"><b>Patient:</b> {{ $appointment->patient_name }}<br><b>Date:</b> {{ $appointment->appointment_date->format('d M Y') }}<br><b>Time:</b> {{ substr($appointment->appointment_time,0,5) }}<br><b>Status:</b> {{ ucfirst($appointment->status) }}</div>
<p style="font-size:13px;color:#7a8798">Sign in to the Doctor Portal to review the appointment and patient context you are authorized to access.</p>
@endsection
