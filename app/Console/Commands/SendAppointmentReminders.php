<?php

namespace App\Console\Commands;

use App\Mail\AppointmentReminderMail;
use App\Models\Appointment;
use App\Services\FirebaseMessagingService;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;

class SendAppointmentReminders extends Command
{
    protected $signature = 'appointments:send-reminders';
    protected $description = 'Send 24-hour and 2-hour clinic appointment reminders';

    public function handle(FirebaseMessagingService $push): int
    {
        foreach ([['reminder_24h_sent_at', 24], ['reminder_2h_sent_at', 2]] as [$column, $hours]) {
            Appointment::with(['patient', 'doctor'])->whereIn('status', ['pending', 'confirmed'])->whereNull($column)
                ->whereBetween('appointment_date', [now()->toDateString(), now()->addDay()->toDateString()])->get()
                ->filter(fn (Appointment $appointment) => now()->diffInMinutes($this->startsAt($appointment), false) <= $hours * 60 && now()->diffInMinutes($this->startsAt($appointment), false) > ($hours * 60 - 6))
                ->each(function (Appointment $appointment) use ($column, $hours, $push) {
                    Mail::to($appointment->patient_email)->send(new AppointmentReminderMail($appointment));
                    if ($appointment->patient) $push->sendToUser($appointment->patient, 'Appointment reminder', "Your appointment with {$appointment->doctor->name} is in {$hours} hour(s).", ['appointment_id' => $appointment->id, 'type' => 'reminder']);
                    $appointment->forceFill([$column => now()])->save();
                });
        }
        return self::SUCCESS;
    }

    private function startsAt(Appointment $appointment): \Carbon\Carbon { return \Carbon\Carbon::parse($appointment->appointment_date->toDateString().' '.$appointment->appointment_time); }
}
