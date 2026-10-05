<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MedicalRecord extends Model
{
    protected $fillable = [
        'patient_id','doctor_id','appointment_id','diagnosis','symptoms',
        'clinical_notes','prescription','treatment_plan','follow_up_instructions',
        'test_recommendations','medical_history','visit_notes','doctor_notes',
        'patient_visible_notes',
    ];

    public function patient(): BelongsTo { return $this->belongsTo(User::class, 'patient_id'); }
    public function doctor(): BelongsTo { return $this->belongsTo(Doctor::class); }
    public function appointment(): BelongsTo { return $this->belongsTo(Appointment::class); }
}
