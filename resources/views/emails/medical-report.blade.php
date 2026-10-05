@extends('emails.layout')
@section('content')
<h1 style="margin:0 0 10px;font-size:28px">A new medical report is available</h1>
<p style="line-height:1.7;color:#59697e">A doctor has added a new medical report to your secure MediCare account. For privacy, the report itself is not attached to this email.</p>
<p style="margin:28px 0"><a href="{{ $dashboardUrl }}" style="display:inline-block;background:#1f83fb;color:#fff;text-decoration:none;padding:14px 22px;border-radius:10px;font-weight:700">View Securely</a></p>
@endsection
