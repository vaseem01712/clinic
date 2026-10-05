<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Appointment extends Model
{
    protected $fillable = [
        'patient_id','doctor_id','specialty_id','service_id','appointment_date',
        'appointment_time','patient_name','patient_email','patient_phone','message','status',
    ];
    protected $casts = ['appointment_date' => 'date', 'reminder_24h_sent_at' => 'datetime', 'reminder_2h_sent_at' => 'datetime'];

    public function patient(): BelongsTo { return $this->belongsTo(User::class, 'patient_id'); }
    public function doctor(): BelongsTo { return $this->belongsTo(Doctor::class); }
    public function specialty(): BelongsTo { return $this->belongsTo(Specialty::class); }
    public function service(): BelongsTo { return $this->belongsTo(Service::class); }
    public function reports() { return $this->hasMany(MedicalReport::class); }
    public function medicalRecords() { return $this->hasMany(MedicalRecord::class); }
}
