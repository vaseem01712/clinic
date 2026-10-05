@extends('emails.layout')
@section('content')
<h1 style="margin:0 0 10px;font-size:28px">Reset your password</h1>
<p style="line-height:1.7;color:#59697e">We received a password reset request for your {{ $portalLabel }} account.</p>
<p style="margin:28px 0"><a href="{{ $resetUrl }}" style="display:inline-block;background:#1f83fb;color:#fff;text-decoration:none;padding:14px 22px;border-radius:10px;font-weight:700">Reset Password</a></p>
<p style="font-size:13px;color:#7a8798">This link expires in 30 minutes and can be used once.</p>
@endsection
