<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DoctorAvailability extends Model
{
    protected $fillable = [
        'doctor_id','weekday','start_time','end_time',
        'break_start','break_end','slot_duration_minutes','is_active',
    ];

    protected $casts = ['is_active' => 'boolean'];

    public function doctor(): BelongsTo { return $this->belongsTo(Doctor::class); }

    /** Generate available time slots for this availability rule minus already-booked ones */
    public function generateSlots(string $date): array
    {
        $slots = [];
        $start = \Carbon\Carbon::parse($date.' '.$this->start_time);
        $end = \Carbon\Carbon::parse($date.' '.$this->end_time);
        $breakStart = $this->break_start ? \Carbon\Carbon::parse($date.' '.$this->break_start) : null;
        $breakEnd = $this->break_end ? \Carbon\Carbon::parse($date.' '.$this->break_end) : null;

        $booked = Appointment::where('doctor_id', $this->doctor_id)
            ->where('appointment_date', $date)
            ->whereIn('status', ['pending','confirmed'])
            ->pluck('appointment_time')
            ->map(fn ($t) => substr($t, 0, 5))
            ->all();

        while ($start->lt($end)) {
            $inBreak = $breakStart && $breakEnd && $start->gte($breakStart) && $start->lt($breakEnd);
            $time = $start->format('H:i');
            if (! $inBreak && ! in_array($time, $booked, true)) {
                $slots[] = $time;
            }
            $start->addMinutes($this->slot_duration_minutes);
        }

        return $slots;
    }
}
