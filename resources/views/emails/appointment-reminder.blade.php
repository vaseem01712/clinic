@component('emails.layout')
    <h2>Your appointment is coming up</h2>
    <p>Hello {{ $appointment->patient_name }}, this is a friendly reminder of your appointment with {{ $appointment->doctor->name }}.</p>
    <p><strong>{{ $appointment->appointment_date->format('l, d M Y') }}</strong> at <strong>{{ \Carbon\Carbon::parse($appointment->appointment_time)->format('h:i A') }}</strong></p>
    <p>Please arrive a few minutes early. If you need to reschedule, please contact the clinic.</p>
@endcomponent
